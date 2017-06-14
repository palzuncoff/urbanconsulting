<?php
/**
 * Created by PhpStorm.
 * User: aron-destiny
 * Date: 12/7/16
 * Time: 1:25 PM
 */

namespace Axisubs\Models\Site;
use Axisubs\Helper;
use Corcel\Post;
use Herbert\Framework\Models\PostMeta;
class User extends Post{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    //user Login
    public static function loginUser($post)
    {
        if(isset($post['axisubs']['user'])){
            $userLogin = $post['axisubs']['user'];
            if($userLogin['user_name']!= '' && $userLogin['password']!= ''){
                $user = wp_authenticate($userLogin['user_name'], $userLogin['password']);
                if ( ! is_wp_error($user) ) {
                    wp_signon( array('user_login' => $userLogin['user_name'], 'user_password' => $userLogin['password']), '');
                    $result['status'] = 'success';
                    $result['message'] = 'Successfully LoggedIn! We are redirecting please wait..';
                } else {
                    $result['status'] = 'failed';//failed
                    $result['message'] = 'Invalid credentials.';
                }
            } else {
                $result['status'] = 'failed';
                $result['message'] = 'Invalid data.';
            }
        } else {
            $result['status'] = 'failed';
            $result['message'] = 'Invalid data.';
        }
        return $result;
    }

    //Register user
    public static function registerUser($post, $admin = 0){
        if(isset($post['axisubs']['subscribe']) && isset($post['axisubs']['user'])){
            $userRegister = $post['axisubs']['subscribe'];
            $userPassword = $post['axisubs']['user'];
            // validate Email
            $email = $userRegister['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $result['status'] = 'failed';
                $result['message'] = 'Invalid email format.';
                $result['field'] = 'email';
                return $result;
            }
            if(!username_exists($userRegister['email'])){
                if(!email_exists($userRegister['email'])){
                    $userID = wp_create_user($userRegister['email'], $userPassword['password1'], $userRegister['email']);
                    if($userID){
                        $userdata['ID'] = $userID;
                        $userdata['first_name'] = $userRegister['first_name'];
                        $userdata['last_name'] = $userRegister['last_name'];
                        $userdata['user_login'] = $userRegister['email'];
                        $userdata['user_email'] = $userRegister['email'];
                        wp_insert_user($userdata);
                        if(!$admin){
                            wp_signon( array('user_login' => $userRegister['email'], 'user_password' => $userPassword['password1']), '');    
                        }                        
                        $result['status'] = 'success';
                        $result['message'] = 'Registration successfull. Please wait..';
                        $result['ID'] = $userID;
                    } else {
                        $result['status'] = 'failed';
                        $result['message'] = 'Unable to register user. Please try again.';
                    }
                } else {
                    $result['status'] = 'failed';
                    $result['message'] = 'Email already exists';
                    $result['field'] = 'email';
                }
            } else {
                $result['status'] = 'failed';
                $result['message'] = 'User Name already exists';
                $result['field'] = 'email';
            }
        } else {
            $result['status'] = 'failed';
            $result['message'] = 'Invalid data.';
        }
        return $result;
    }
}