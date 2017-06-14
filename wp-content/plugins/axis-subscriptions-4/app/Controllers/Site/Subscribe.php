<?php
/**
 * Created by PhpStorm.
 * User: aron-destiny
 * Date: 12/7/16
 * Time: 12:52 PM
 */
namespace Axisubs\Controllers\Site;

use Axisubs\Models\Site\Plans;
use Axisubs\Helper\Currency;
use Herbert\Framework\Http;
use Herbert\Framework\Notifier;
use Axisubs\Helper\Status;
use Axisubs\Helper\FrontEndMessages;
use Axisubs\Helper;
use Axisubs\Controllers\Controller;
use Axisubs\Helper\ManageUser;
use Axisubs\Helper\Pagination;
use Axisubs\Helper\Countries;
use Axisubs\Models\Admin\Subscriptions;

class Subscribe extends Controller{

    public $_controller = 'Subscribe';
    public $_path = 'Site';
    public $message = null;

    /**
     * Show My Subscriptions Default layout
     * */
    public function index(){
        $http = Http::capture();        
        $currency = new Currency();
        $data = array();
        $currencyData['code'] = $currency->getCurrencyCode();
        $currencyData['currency'] = $currency->getCurrency();
        $site_url = get_site_url();
        $pagetitle = "Subscriptions";
        //$subscribtions_url = get_site_url().'/index.php?axisubs_subscribes=subscribe';
        $subscribtions_url = $this->getAxiSubsURLs('subscribe');
        $wp_user = ManageUser::getInstance()->getUserDetails();
        $user_id = $wp_user->ID;
        if($user_id){
            Plans::populateStates($http->all());
            $subscribers = Plans::loadAllSubscribes();
            $pagination = new Pagination(Plans::$_start, Plans::$_limit, Plans::$_total);
            $paginationD['limitbox'] = $pagination->getLimitBox();
            $paginationD['links'] = $pagination->getPaginationLinks();
        } else {
            $subscribers = array();
        }
        $model = $this->getModel('Plans');
        $model->additionalButtonsInSubscription($subscribers);
        $data['statusText'] = Status::getAllStatusCodesWithHtml();
        $message = $this->message;
        $data['plugin_url'] = AXISUBS_PLUGIN_URL;
        return view('@Axisubs/Site/subscribed/list.twig', compact('pagetitle', 'subscribtions_url', 'subscribers', 'currencyData', 'site_url', 'message', 'paginationD', 'data'));
    }

    /**
     * Subscription detail view
     * */
    public function view($sid = 0){
        $http = Http::capture();
        $http->request->set('task', 'view');
        $http = $this->getQueryStringData($http);
        $currency = new Currency();
        $currencyData['code'] = $currency->getCurrencyCode();
        $currencyData['currency'] = $currency->getCurrency();
        $site_url = get_site_url();
        $pagetitle = "Subscriptions";
        //$subscribtions_url = get_site_url().'/index.php?axisubs_subscribes=subscribe';
        $subscribtions_url = $this->getAxiSubsURLs('subscribe');
        $wp_user = ManageUser::getInstance()->getUserDetails();
        $user_id = $wp_user->ID;
        if($http->get('sid')) {
            $subscriber = Plans::loadSubscriber($http->get('sid'));
            if(isset($subscriber->ID) && isset($subscriber->meta[$subscriber->ID.'_axisubs_subscribe_plan_id'])){
                if($subscriber->meta[$subscriber->ID.'_axisubs_subscribe_user_id'] == $user_id) {
                    $planDetails = Plans::loadPlan($subscriber->meta[$subscriber->ID . '_axisubs_subscribe_plan_id']);
                    $status = new Status();
                    $statusCode = $subscriber->meta[$subscriber->ID . '_axisubs_subscribe_status'];
                    $statusText = $status->getStatusTextInHTML($statusCode);
                    $custCountry = $subscriber->meta[$subscriber->ID.'_axisubs_subscribe_country'];
                    $custProvince = $subscriber->meta[$subscriber->ID.'_axisubs_subscribe_province'];
                    $modelZone = $this->getModel('Zones', 'Admin');
                    $data['province'] = $modelZone->getProvinceName($custProvince, $custCountry);
                    $data['country'] = Countries::getCountryName($custCountry);
                    $data['plugin_url'] = AXISUBS_PLUGIN_URL;
                    //pre process the plan
                    $model = $this->getModel('Plans');
                    $subscriber->plan = $planDetails;
                    $model->additionalButtonsInSubscription($subscriber);
                    $model->preProcessSubscription($subscriber, $data);
                    $data['cancel_url'] = '';
                    if(isset($data['allow_cancel']) && $data['allow_cancel'] == 1){
                        if($statusCode == 'ACTIVE'){
                            $data['cancel_url'] = get_site_url().'/index.php?axisubs_subscribes=subscribe&task=cancel&sid='.$subscriber->ID;
                        }
                    }
                    $message = $this->message;
                    return view('@Axisubs/Site/subscribed/singlesubscription.twig', compact('data', 'pagetitle', 'subscribtions_url', 'subscriber', 'currencyData', 'site_url', 'planDetails', 'statusText', 'message'));
                } else {
                    $this->message = FrontEndMessages::failure('Invalid access');
                }
            } else {
                $this->message = FrontEndMessages::failure('Invalid access');
            }
        }
        return $this->index();
    }

    /**
     * Cancel subscription
     * */
    public function cancel(){
        $http = Http::capture();
        if($http->get('sid')) {
            $subscriber = Plans::loadSubscriber($http->get('sid'));
            $subscribtions_url = $this->getAxiSubsURLs('subscribe');
            $wp_user = ManageUser::getInstance()->getUserDetails();
            $user_id = $wp_user->ID;
            if(isset($subscriber->ID) && isset($subscriber->meta[$subscriber->ID.'_axisubs_subscribe_plan_id'])){
                $statusCode = $subscriber->meta[$subscriber->ID . '_axisubs_subscribe_status'];
                if($subscriber->meta[$subscriber->ID.'_axisubs_subscribe_user_id'] == $user_id && $statusCode != "CANCELED") {
                    $result = Subscriptions::cancelSubscriptions($http->get('sid'));
                    if($result){
                        $this->message = FrontEndMessages::success(esc_html__('Successfully canceled'));
                    } else {
                        $this->message = FrontEndMessages::failure(esc_html__('Failed to cancel'));
                    }
                    return $this->view($http->get('sid'));
                }
            }
        }
        $this->message = FrontEndMessages::failure('Invalid access');
        return $this->index();
    }
}