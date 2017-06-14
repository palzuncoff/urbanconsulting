<?php

/* @Axisubs/Site/subscribe/details.twig */
class __TwigTemplate_4c38f40f5f3a19b02301ea167489b80d467c863f6c4afe9901d6b0f54f3792c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"axisubs wrap\">
    ";
        // line 2
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "ID", array(), "array") > 0)) {
            // line 3
            echo "        ";
            $context["id"] = $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "ID", array(), "array");
            // line 4
            echo "        ";
            $context["userMeta"] = $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "meta", array(), "array");
            // line 5
            echo "        ";
            $context["userPrefix"] = ((($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "ID", array(), "array") . "_") . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "post_type", array(), "array")) . "_");
            // line 6
            echo "    <div class=\"axisubs-plan_details\">
      <!-- <div class=\"plans-header\">
        <div class=\"axisubs-plan_details-title\">
            ";
            // line 9
            echo twig_escape_filter($this->env, (isset($context["pagetitle"]) ? $context["pagetitle"] : null), "html", null, true);
            echo "
        </div>
        <div class=\"axisubs-plan-price-title\">
          Item Price
        </div>
      </div> -->

        <!-- <div class=\"axisubs-plan_details-summary\">
          <div class=\"content-plan\">
            <div class=\"plan_list\">
              <div class=\"list-image bs\">
                  ";
            // line 20
            if (($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_image"), array(), "array") == "")) {
                // line 21
                echo "                      <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "plugin_url", array(), "array"), "html", null, true);
                echo "/resources/assets/images/ico_noimage.png\">
                  ";
            } else {
                // line 23
                echo "                      <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_image"), array(), "array"), "html", null, true);
                echo "\">
                  ";
            }
            // line 25
            echo "              </div>
              <div class=\"list-content\">
                  ";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_name"), array(), "array"), "html", null, true);
            echo "
              </div>
              <div class=\"desc\">
                  ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_description"), array(), "array"), "html", null, true);
            echo "
              </div>
            </div>
            <div class=\"axisubs-plan-prices\">
              <div class=\"axisubs-plan-basic-fee\">
                  <div class=\"axisubs-plan-fee\">
                      Price :
                    <span class=\"axisubs-plan-basic-fee-amt\">
                        ";
            // line 38
            if (($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_price"), array(), "array", true, true) && ($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_price"), array(), "array") > 0))) {
                // line 39
                echo "                            ";
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["currencyData"]) ? $context["currencyData"] : null), "code", array(), "array") . $this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_price"), array(), "array")), "html", null, true);
                echo "
                        ";
            } else {
                // line 41
                echo "                            ";
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["currencyData"]) ? $context["currencyData"] : null), "code", array(), "array") . "0"), "html", null, true);
                echo "
                        ";
            }
            // line 43
            echo "                    </span>
                  </div>
              </div>
              ";
            // line 46
            if ((($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_setup_cost"), array(), "array") > 0) && ($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), "allow_setupcost", array(), "array") == "1"))) {
                // line 47
                echo "              <div class=\"axisubs-plan-setup-fee\">
                  <div class=\"axisubs-plan-setup-fee-text\">
                      Setup Cost :
                      <span class=\"axisubs-plan-setup-fee-amt\">
                          ";
                // line 51
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["currencyData"]) ? $context["currencyData"] : null), "code", array(), "array") . $this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_setup_cost"), array(), "array")), "html", null, true);
                echo "
                      </span>
                  </div>
              </div>
              ";
            }
            // line 56
            echo "            </div>
          </div>
        
            ";
            // line 59
            echo $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "content_in_price_list", array(), "array");
            echo "
            <div class=\"axisubs-plan-total-fee\">
                <div class=\"axisubs-plan-total-fee-text\">
                    Total :
                    <span class=\"axisubs-plan-total-fee-amt\">
                        ";
            // line 64
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["currencyData"]) ? $context["currencyData"] : null), "code", array(), "array") . $this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), "total_price", array(), "array")), "html", null, true);
            echo "
                    </span>
                </div>
            </div>
            ";
            // line 68
            echo $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "content_after_price", array(), "array");
            echo "
        </div> -->
    </div>
    ";
            // line 71
            if ((isset($context["user_id"]) ? $context["user_id"] : null)) {
                // line 72
                echo "    ";
            } else {
                // line 73
                echo "    <div class=\"login_registration_tab\">
        <ul class=\"login_registration_tab_ul\">
            <li class=\"active\" data=\"axisubs_login_form_con\">";
                // line 75
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Логин[:ro]Logare")), "html", null, true);
                echo "</li>
            <li data=\"axisubs_registration_form_con\">";
                // line 76
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Регистрация[:ro]Registrare")), "html", null, true);
                echo "</li>
        </ul>
    </div>
    <div class=\"axisubs_login_form_con tab_con\">
        <form id=\"login_user\" action=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "plan_url", array(), "array"), "html", null, true);
                echo "\" method=\"post\">
            <div class=\"axisubs-plan-billinfo-con\">
                <div class=\"axisubs-plan_details-title\">
                    <h3>";
                // line 83
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Логин[:ro]Logare")), "html", null, true);
                echo "</h3>
                </div>
                <div class=\"axisubs-plan-billinfo-fields\">
                    <div class=\"axisubs-billinfo-f-i\">
                        <div class=\"axisubs-billinfo-f-label\">
                            <label for=\"axisubs_subscribe_first_name\">
                                ";
                // line 89
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Имя пользователя[:ro]Login")), "html", null, true);
                echo "
                            </label>
                        </div>
                        <div class=\"axisubs-billinfo-f-field\">
                            <input type=\"email\" class=\"required\" value=\"\" name=\"axisubs[user][user_name]\" id=\"axisubs_user_user_name\"/>
                        </div>
                    </div>
                    <div class=\"axisubs-billinfo-f-i\">
                        <div class=\"axisubs-billinfo-f-label\">
                            <label for=\"axisubs_subscribe_first_name\">
                                ";
                // line 99
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Пароль[:ro]Parola")), "html", null, true);
                echo "
                            </label>
                        </div>
                        <div class=\"axisubs-billinfo-f-field\">
                            <input type=\"password\" class=\"required\" value=\"\" name=\"axisubs[user][password]\" id=\"axisubs_user_password\"/>
                        </div>
                    </div>
                </div>
                <div class=\"axisubs-login-message-con\">
                    <div class=\"axisubs-login-message-text hide message\">
                    </div>
                </div>
            </div>
            <div class=\"axisubs-plan-payment-con\">
                <input type=\"hidden\" name=\"task\" value=\"loginUser\"/>
                <div class=\"axisubs-plan-payment-i-block\">
                    <div class=\"axisubs-plan-payment-button\">
                        <button type=\"button\" class=\"btn-vacancyes\" onclick=\"loginUser();\">";
                // line 116
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Авторизация[:ro]Login")), "html", null, true);
                echo "</button>
                        <p class=\"password-recover\" style=\"text-align: center;\"><a href=\"https://urbanconsulting.md/login/?redirect_to=https%3A%2F%2Furbanconsulting.md%2Flogin%2F%3Faction%3Drecovered&amp;action=passwordtitle=\"Recover Lost Password\">Забыли пароль?</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
    ";
            }
            // line 124
            echo "    <div class=\"axisubs_registration_form_con tab_con ";
            if (((isset($context["user_id"]) ? $context["user_id"] : null) == "")) {
                echo " hide ";
            }
            echo "\">
        <form id=\"register_user\" action=\"";
            // line 125
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "plan_url", array(), "array"), "html", null, true);
            echo "\" method=\"post\">
            <div class=\"axisubs-plan-billinfo-con\">
                <div class=\"axisubs-plan_details-title\">
                    <div class=\"sub-title\">
                        <h3>";
            // line 129
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Регистрация[:ro]Registrare")), "html", null, true);
            echo "</h3>
                    </div>
                </div>
                <div class=\"axisubs-plan-billinfo-fields\">
                    <!-- <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_first_name\">
                                    First Name
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 141
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_first_name"), array(), "array")) {
                // line 142
                echo "                                    ";
                $context["firstname"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_first_name"), array(), "array");
                // line 143
                echo "                                ";
            } else {
                // line 144
                echo "                                    ";
                $context["firstname"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "first_name"), array(), "array");
                // line 145
                echo "                                ";
            }
            // line 146
            echo "                                <input type=\"text\" class=\"required\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["firstname"]) ? $context["firstname"] : null), "html", null, true);
            echo "\" name=\"axisubs[subscribe][first_name]\" id=\"axisubs_subscribe_first_name\"/>
                            </div>
                        </div>
                    </div>
                    <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_last_name\">
                                    Last Name
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 158
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_last_name"), array(), "array")) {
                // line 159
                echo "                                    ";
                $context["last_name"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_last_name"), array(), "array");
                // line 160
                echo "                                ";
            } else {
                // line 161
                echo "                                    ";
                $context["last_name"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "last_name"), array(), "array");
                // line 162
                echo "                                ";
            }
            // line 163
            echo "                                <input type=\"text\" class=\"required\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["last_name"]) ? $context["last_name"] : null), "html", null, true);
            echo "\" name=\"axisubs[subscribe][last_name]\" id=\"axisubs_subscribe_last_name\"/>
                            </div>
                        </div>
                    </div> -->
                    <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_email\">
                                    ";
            // line 171
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Email[:ro]Email")), "html", null, true);
            echo "
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 175
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_email"), array(), "array")) {
                // line 176
                echo "                                    ";
                $context["email"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_email"), array(), "array");
                // line 177
                echo "                                ";
            } else {
                // line 178
                echo "                                    ";
                $context["email"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "email"), array(), "array");
                // line 179
                echo "                                ";
            }
            // line 180
            echo "                                <input type=\"text\" class=\"required\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
            echo "\" name=\"axisubs[subscribe][email]\" id=\"axisubs_subscribe_email\"/>
                            </div>
                        </div>
                    </div>
                    ";
            // line 184
            if (((isset($context["user_id"]) ? $context["user_id"] : null) == "")) {
                // line 185
                echo "                        <div class=\"axisubs-billinfo-f-c\">
                            <div class=\"axisubs-billinfo-f-i\">
                                <div class=\"axisubs-billinfo-f-label\">
                                    <label for=\"axisubs_user_password1\">
                                        ";
                // line 189
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Пароль[:ro]Parola")), "html", null, true);
                echo "
                                    </label>
                                </div>
                                <div class=\"axisubs-billinfo-f-field\">
                                    <input type=\"text\" class=\"required\" name=\"axisubs[user][password1]\" id=\"axisubs_user_password1\"/>
                                </div>
                            </div>
                        </div>
                        <div class=\"axisubs-billinfo-f-c\">
                            <div class=\"axisubs-billinfo-f-i\">
                                <div class=\"axisubs-billinfo-f-label\">
                                    <label for=\"axisubs_user_password2\">
                                        ";
                // line 201
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Ещё раз пароль[:ro]Confirma parola")), "html", null, true);
                echo "
                                    </label>
                                </div>
                                <div class=\"axisubs-billinfo-f-field\">
                                    <input type=\"text\" class=\"required\" name=\"axisubs[user][password2]\" id=\"axisubs_user_password2\"/>
                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 210
            echo "                    <!-- <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_address_line1\">
                                    Address Line 1
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 218
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_address_line1"), array(), "array")) {
                // line 219
                echo "                                    ";
                $context["address_line1"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_address_line1"), array(), "array");
                // line 220
                echo "                                ";
            } else {
                // line 221
                echo "                                    ";
                $context["address_line1"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "address_line1"), array(), "array");
                // line 222
                echo "                                ";
            }
            // line 223
            echo "                                <input type=\"text\" class=\"required\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["address_line1"]) ? $context["address_line1"] : null), "html", null, true);
            echo "\" name=\"axisubs[subscribe][address_line1]\" id=\"axisubs_subscribe_address_line1\"/>
                            </div>
                        </div>
                    </div>
                    <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_address_line2\">
                                    Address Line 2
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 235
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_address_line2"), array(), "array")) {
                // line 236
                echo "                                    ";
                $context["address_line2"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_address_line2"), array(), "array");
                // line 237
                echo "                                ";
            } else {
                // line 238
                echo "                                    ";
                $context["address_line2"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "address_line2"), array(), "array");
                // line 239
                echo "                                ";
            }
            // line 240
            echo "                                <input type=\"text\" name=\"axisubs[subscribe][address_line2]\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["address_line2"]) ? $context["address_line2"] : null), "html", null, true);
            echo "\" id=\"axisubs_subscribe_address_line2\"/>
                            </div>
                        </div>
                    </div>
                    <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_city\">
                                    City
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 252
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_city"), array(), "array")) {
                // line 253
                echo "                                    ";
                $context["city"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_city"), array(), "array");
                // line 254
                echo "                                ";
            } else {
                // line 255
                echo "                                    ";
                $context["city"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "city"), array(), "array");
                // line 256
                echo "                                ";
            }
            // line 257
            echo "                                <input type=\"text\" class=\"required\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["city"]) ? $context["city"] : null), "html", null, true);
            echo "\" name=\"axisubs[subscribe][city]\" id=\"axisubs_subscribe_city\"/>
                            </div>
                        </div>
                    </div>
                    <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_pincode\">
                                    Zip code
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 269
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_pincode"), array(), "array")) {
                // line 270
                echo "                                    ";
                $context["pincode"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_pincode"), array(), "array");
                // line 271
                echo "                                ";
            } else {
                // line 272
                echo "                                    ";
                $context["pincode"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "pincode"), array(), "array");
                // line 273
                echo "                                ";
            }
            // line 274
            echo "                                <input type=\"text\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["pincode"]) ? $context["pincode"] : null), "html", null, true);
            echo "\" name=\"axisubs[subscribe][pincode]\" id=\"axisubs_subscribe_pincode\"/>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_country\">
                                    Country
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 286
            echo $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "country", array(), "array");
            echo "
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_province\">
                                    State
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 298
            echo $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "province", array(), "array");
            echo "
                            </div>
                        </div>
                    </div>
                    <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_phone\">
                                    Phone
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 310
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_phone"), array(), "array")) {
                // line 311
                echo "                                    ";
                $context["phone"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_phone"), array(), "array");
                // line 312
                echo "                                ";
            } else {
                // line 313
                echo "                                    ";
                $context["phone"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "phone"), array(), "array");
                // line 314
                echo "                                ";
            }
            // line 315
            echo "                                <input type=\"text\" class=\"required\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["phone"]) ? $context["phone"] : null), "html", null, true);
            echo "\" name=\"axisubs[subscribe][phone]\" id=\"axisubs_subscribe_phone\"/>
                            </div>
                        </div>
                    </div>
                    <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_company\">
                                    Company
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 327
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_company"), array(), "array")) {
                // line 328
                echo "                                    ";
                $context["company"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_company"), array(), "array");
                // line 329
                echo "                                ";
            } else {
                // line 330
                echo "                                    ";
                $context["company"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "company"), array(), "array");
                // line 331
                echo "                                ";
            }
            // line 332
            echo "                                <input type=\"text\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["company"]) ? $context["company"] : null), "html", null, true);
            echo "\" name=\"axisubs[subscribe][company]\" id=\"axisubs_subscribe_company\"/>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class=\"axisubs-billinfo-f-c\">
                        <div class=\"axisubs-billinfo-f-i\">
                            <div class=\"axisubs-billinfo-f-label\">
                                <label for=\"axisubs_subscribe_vat_number\">
                                    Tax number
                                </label>
                            </div>
                            <div class=\"axisubs-billinfo-f-field\">
                                ";
            // line 344
            if ($this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_vat_number"), array(), "array")) {
                // line 345
                echo "                                    ";
                $context["vat_number"] = $this->getAttribute($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "meta", array(), "array"), ($this->getAttribute((isset($context["subscriber"]) ? $context["subscriber"] : null), "ID", array(), "array") . "_axisubs_subscribe_vat_number"), array(), "array");
                // line 346
                echo "                                ";
            } else {
                // line 347
                echo "                                    ";
                $context["vat_number"] = $this->getAttribute((isset($context["userMeta"]) ? $context["userMeta"] : null), ((isset($context["userPrefix"]) ? $context["userPrefix"] : null) . "vat_number"), array(), "array");
                // line 348
                echo "                                ";
            }
            // line 349
            echo "                                <input type=\"text\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["vat_number"]) ? $context["vat_number"] : null), "html", null, true);
            echo "\" name=\"axisubs[subscribe][vat_number]\" id=\"axisubs_subscribe_vat_number\"/>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class=\"axisubs-register-message-con\">
                <div class=\"axisubs-register-message-text hide message\">
                </div>
            </div>
            <div class=\"axisubs-plan-payment-con\">
                ";
            // line 360
            if (($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_type"), array(), "array") != "free")) {
                // line 361
                echo "                <div class=\"payment-method\">
                  <div class=\"axisubs-plan_details-title\">
                      <h3>Payment methods</h3>
                  </div>
                  ";
            }
            // line 366
            echo "                  <input type=\"hidden\" name=\"task\" value=\"save\"/>
                  <input type=\"hidden\" name=\"id\" value=\"";
            // line 367
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "\"/>
                    ";
            // line 368
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "upgrade", array(), "array")) {
                // line 369
                echo "                        <input type=\"hidden\" name=\"upgrade\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "upgrade", array(), "array"), "html", null, true);
                echo "\"/>
                    ";
            }
            // line 371
            echo "                  <div class=\"axisubs-plan-payment-i-block\">
                      ";
            // line 372
            if (($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), ((isset($context["id"]) ? $context["id"] : null) . "_axisubs_plans_type"), array(), "array") != "free")) {
                // line 373
                echo "                          <div class=\"axisubs-plan-payment-block-con\">
                              ";
                // line 374
                echo $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "paymentMethods", array(), "array");
                echo "
                          </div>
                      ";
            }
            // line 377
            echo "                      <div class=\"axisubs-plan-payment-button\">
                          ";
            // line 378
            if ((isset($context["user_id"]) ? $context["user_id"] : null)) {
                // line 379
                echo "                              <button type=\"button\" class=\"btn-vacancyes\" onclick=\"submitSubscriptions();\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Отправить[:ro]Trimite")), "html", null, true);
                echo "</button>
                          ";
            } else {
                // line 381
                echo "                              <button type=\"button\" class=\"btn-vacancyes\" onclick=\"registerUser();\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("[:ru]Регистрация[:ro]Registrare")), "html", null, true);
                echo "</button>
                          ";
            }
            // line 383
            echo "                      </div>
                  </div>
                </div>
            </div>
        </form>
    </div>
    <input type=\"hidden\" id=\"site_url\" value=\"";
            // line 389
            echo twig_escape_filter($this->env, (isset($context["site_url"]) ? $context["site_url"] : null), "html", null, true);
            echo "\"/>
    ";
        } else {
            // line 391
            echo "        <div class=\"axisubs-plan-notfound\">
            Invalid Data
        </div>
    ";
        }
        // line 395
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@Axisubs/Site/subscribe/details.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  699 => 395,  693 => 391,  688 => 389,  680 => 383,  674 => 381,  668 => 379,  666 => 378,  663 => 377,  657 => 374,  654 => 373,  652 => 372,  649 => 371,  643 => 369,  641 => 368,  637 => 367,  634 => 366,  627 => 361,  625 => 360,  610 => 349,  607 => 348,  604 => 347,  601 => 346,  598 => 345,  596 => 344,  580 => 332,  577 => 331,  574 => 330,  571 => 329,  568 => 328,  566 => 327,  550 => 315,  547 => 314,  544 => 313,  541 => 312,  538 => 311,  536 => 310,  521 => 298,  506 => 286,  490 => 274,  487 => 273,  484 => 272,  481 => 271,  478 => 270,  476 => 269,  460 => 257,  457 => 256,  454 => 255,  451 => 254,  448 => 253,  446 => 252,  430 => 240,  427 => 239,  424 => 238,  421 => 237,  418 => 236,  416 => 235,  400 => 223,  397 => 222,  394 => 221,  391 => 220,  388 => 219,  386 => 218,  376 => 210,  364 => 201,  349 => 189,  343 => 185,  341 => 184,  333 => 180,  330 => 179,  327 => 178,  324 => 177,  321 => 176,  319 => 175,  312 => 171,  300 => 163,  297 => 162,  294 => 161,  291 => 160,  288 => 159,  286 => 158,  270 => 146,  267 => 145,  264 => 144,  261 => 143,  258 => 142,  256 => 141,  241 => 129,  234 => 125,  227 => 124,  216 => 116,  196 => 99,  183 => 89,  174 => 83,  168 => 80,  161 => 76,  157 => 75,  153 => 73,  150 => 72,  148 => 71,  142 => 68,  135 => 64,  127 => 59,  122 => 56,  114 => 51,  108 => 47,  106 => 46,  101 => 43,  95 => 41,  89 => 39,  87 => 38,  76 => 30,  70 => 27,  66 => 25,  60 => 23,  54 => 21,  52 => 20,  38 => 9,  33 => 6,  30 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="axisubs wrap">*/
/*     {% if item['ID'] > 0 %}*/
/*         {% set id = item['ID'] %}*/
/*         {% set userMeta = user['meta'] %}*/
/*         {% set userPrefix = user['ID']~'_'~user['post_type']~'_' %}*/
/*     <div class="axisubs-plan_details">*/
/*       <!-- <div class="plans-header">*/
/*         <div class="axisubs-plan_details-title">*/
/*             {{ pagetitle }}*/
/*         </div>*/
/*         <div class="axisubs-plan-price-title">*/
/*           Item Price*/
/*         </div>*/
/*       </div> -->*/
/* */
/*         <!-- <div class="axisubs-plan_details-summary">*/
/*           <div class="content-plan">*/
/*             <div class="plan_list">*/
/*               <div class="list-image bs">*/
/*                   {% if meta[id~'_axisubs_plans_image'] == '' %}*/
/*                       <img src="{{ data['plugin_url'] }}/resources/assets/images/ico_noimage.png">*/
/*                   {% else %}*/
/*                       <img src="{{ meta[id~'_axisubs_plans_image'] }}">*/
/*                   {% endif %}*/
/*               </div>*/
/*               <div class="list-content">*/
/*                   {{ meta[id~'_axisubs_plans_name'] }}*/
/*               </div>*/
/*               <div class="desc">*/
/*                   {{ meta[id~'_axisubs_plans_description'] }}*/
/*               </div>*/
/*             </div>*/
/*             <div class="axisubs-plan-prices">*/
/*               <div class="axisubs-plan-basic-fee">*/
/*                   <div class="axisubs-plan-fee">*/
/*                       Price :*/
/*                     <span class="axisubs-plan-basic-fee-amt">*/
/*                         {% if meta[id~'_axisubs_plans_price'] is defined and meta[id~'_axisubs_plans_price'] > 0 %}*/
/*                             {{ currencyData['code']~meta[id~'_axisubs_plans_price'] }}*/
/*                         {% else %}*/
/*                             {{ currencyData['code']~'0' }}*/
/*                         {% endif %}*/
/*                     </span>*/
/*                   </div>*/
/*               </div>*/
/*               {% if ((meta[id~'_axisubs_plans_setup_cost']>0) and (meta['allow_setupcost'] == "1")) %}*/
/*               <div class="axisubs-plan-setup-fee">*/
/*                   <div class="axisubs-plan-setup-fee-text">*/
/*                       Setup Cost :*/
/*                       <span class="axisubs-plan-setup-fee-amt">*/
/*                           {{ currencyData['code']~meta[id~'_axisubs_plans_setup_cost'] }}*/
/*                       </span>*/
/*                   </div>*/
/*               </div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*         */
/*             {{ data['content_in_price_list'] | raw }}*/
/*             <div class="axisubs-plan-total-fee">*/
/*                 <div class="axisubs-plan-total-fee-text">*/
/*                     Total :*/
/*                     <span class="axisubs-plan-total-fee-amt">*/
/*                         {{ currencyData['code']~meta['total_price'] }}*/
/*                     </span>*/
/*                 </div>*/
/*             </div>*/
/*             {{ data['content_after_price'] | raw }}*/
/*         </div> -->*/
/*     </div>*/
/*     {% if(user_id) %}*/
/*     {% else %}*/
/*     <div class="login_registration_tab">*/
/*         <ul class="login_registration_tab_ul">*/
/*             <li class="active" data="axisubs_login_form_con">{{__('[:ru]Логин[:ro]Logare')}}</li>*/
/*             <li data="axisubs_registration_form_con">{{__('[:ru]Регистрация[:ro]Registrare')}}</li>*/
/*         </ul>*/
/*     </div>*/
/*     <div class="axisubs_login_form_con tab_con">*/
/*         <form id="login_user" action="{{ data['plan_url'] }}" method="post">*/
/*             <div class="axisubs-plan-billinfo-con">*/
/*                 <div class="axisubs-plan_details-title">*/
/*                     <h3>{{__('[:ru]Логин[:ro]Logare')}}</h3>*/
/*                 </div>*/
/*                 <div class="axisubs-plan-billinfo-fields">*/
/*                     <div class="axisubs-billinfo-f-i">*/
/*                         <div class="axisubs-billinfo-f-label">*/
/*                             <label for="axisubs_subscribe_first_name">*/
/*                                 {{__('[:ru]Имя пользователя[:ro]Login')}}*/
/*                             </label>*/
/*                         </div>*/
/*                         <div class="axisubs-billinfo-f-field">*/
/*                             <input type="email" class="required" value="" name="axisubs[user][user_name]" id="axisubs_user_user_name"/>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="axisubs-billinfo-f-i">*/
/*                         <div class="axisubs-billinfo-f-label">*/
/*                             <label for="axisubs_subscribe_first_name">*/
/*                                 {{__('[:ru]Пароль[:ro]Parola')}}*/
/*                             </label>*/
/*                         </div>*/
/*                         <div class="axisubs-billinfo-f-field">*/
/*                             <input type="password" class="required" value="" name="axisubs[user][password]" id="axisubs_user_password"/>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="axisubs-login-message-con">*/
/*                     <div class="axisubs-login-message-text hide message">*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="axisubs-plan-payment-con">*/
/*                 <input type="hidden" name="task" value="loginUser"/>*/
/*                 <div class="axisubs-plan-payment-i-block">*/
/*                     <div class="axisubs-plan-payment-button">*/
/*                         <button type="button" class="btn-vacancyes" onclick="loginUser();">{{__('[:ru]Авторизация[:ro]Login')}}</button>*/
/*                         <p class="password-recover" style="text-align: center;"><a href="https://urbanconsulting.md/login/?redirect_to=https%3A%2F%2Furbanconsulting.md%2Flogin%2F%3Faction%3Drecovered&amp;action=passwordtitle="Recover Lost Password">Забыли пароль?</a></p>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </form>*/
/*     </div>*/
/*     {% endif %}*/
/*     <div class="axisubs_registration_form_con tab_con {% if(user_id == '') %} hide {% endif %}">*/
/*         <form id="register_user" action="{{ data['plan_url'] }}" method="post">*/
/*             <div class="axisubs-plan-billinfo-con">*/
/*                 <div class="axisubs-plan_details-title">*/
/*                     <div class="sub-title">*/
/*                         <h3>{{__('[:ru]Регистрация[:ro]Registrare')}}</h3>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="axisubs-plan-billinfo-fields">*/
/*                     <!-- <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_first_name">*/
/*                                     First Name*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_first_name']) %}*/
/*                                     {% set firstname = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_first_name'] %}*/
/*                                 {% else %}*/
/*                                     {% set firstname = userMeta[userPrefix~'first_name'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" class="required" value="{{ firstname }}" name="axisubs[subscribe][first_name]" id="axisubs_subscribe_first_name"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_last_name">*/
/*                                     Last Name*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_last_name']) %}*/
/*                                     {% set last_name = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_last_name'] %}*/
/*                                 {% else %}*/
/*                                     {% set last_name = userMeta[userPrefix~'last_name'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" class="required" value="{{ last_name }}" name="axisubs[subscribe][last_name]" id="axisubs_subscribe_last_name"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div> -->*/
/*                     <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_email">*/
/*                                     {{__('[:ru]Email[:ro]Email')}}*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_email']) %}*/
/*                                     {% set email = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_email'] %}*/
/*                                 {% else %}*/
/*                                     {% set email = userMeta[userPrefix~'email'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" class="required" value="{{ email }}" name="axisubs[subscribe][email]" id="axisubs_subscribe_email"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     {% if(user_id == '') %}*/
/*                         <div class="axisubs-billinfo-f-c">*/
/*                             <div class="axisubs-billinfo-f-i">*/
/*                                 <div class="axisubs-billinfo-f-label">*/
/*                                     <label for="axisubs_user_password1">*/
/*                                         {{__('[:ru]Пароль[:ro]Parola')}}*/
/*                                     </label>*/
/*                                 </div>*/
/*                                 <div class="axisubs-billinfo-f-field">*/
/*                                     <input type="text" class="required" name="axisubs[user][password1]" id="axisubs_user_password1"/>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                         <div class="axisubs-billinfo-f-c">*/
/*                             <div class="axisubs-billinfo-f-i">*/
/*                                 <div class="axisubs-billinfo-f-label">*/
/*                                     <label for="axisubs_user_password2">*/
/*                                         {{__('[:ru]Ещё раз пароль[:ro]Confirma parola')}}*/
/*                                     </label>*/
/*                                 </div>*/
/*                                 <div class="axisubs-billinfo-f-field">*/
/*                                     <input type="text" class="required" name="axisubs[user][password2]" id="axisubs_user_password2"/>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     {% endif %}*/
/*                     <!-- <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_address_line1">*/
/*                                     Address Line 1*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_address_line1']) %}*/
/*                                     {% set address_line1 = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_address_line1'] %}*/
/*                                 {% else %}*/
/*                                     {% set address_line1 = userMeta[userPrefix~'address_line1'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" class="required" value="{{ address_line1 }}" name="axisubs[subscribe][address_line1]" id="axisubs_subscribe_address_line1"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_address_line2">*/
/*                                     Address Line 2*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_address_line2']) %}*/
/*                                     {% set address_line2 = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_address_line2'] %}*/
/*                                 {% else %}*/
/*                                     {% set address_line2 = userMeta[userPrefix~'address_line2'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" name="axisubs[subscribe][address_line2]" value="{{ address_line2 }}" id="axisubs_subscribe_address_line2"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_city">*/
/*                                     City*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_city']) %}*/
/*                                     {% set city = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_city'] %}*/
/*                                 {% else %}*/
/*                                     {% set city = userMeta[userPrefix~'city'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" class="required" value="{{ city }}" name="axisubs[subscribe][city]" id="axisubs_subscribe_city"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_pincode">*/
/*                                     Zip code*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_pincode']) %}*/
/*                                     {% set pincode = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_pincode'] %}*/
/*                                 {% else %}*/
/*                                     {% set pincode = userMeta[userPrefix~'pincode'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" value="{{ pincode }}" name="axisubs[subscribe][pincode]" id="axisubs_subscribe_pincode"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div> -->*/
/*                     <!-- <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_country">*/
/*                                     Country*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {{ data['country'] | raw }}*/
/*                             </div>*/
/*                         </div>*/
/*                     </div> -->*/
/*                     <!-- <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_province">*/
/*                                     State*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {{ data['province'] | raw }}*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_phone">*/
/*                                     Phone*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_phone']) %}*/
/*                                     {% set phone = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_phone'] %}*/
/*                                 {% else %}*/
/*                                     {% set phone = userMeta[userPrefix~'phone'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" class="required" value="{{ phone }}" name="axisubs[subscribe][phone]" id="axisubs_subscribe_phone"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_company">*/
/*                                     Company*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_company']) %}*/
/*                                     {% set company = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_company'] %}*/
/*                                 {% else %}*/
/*                                     {% set company = userMeta[userPrefix~'company'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" value="{{ company }}" name="axisubs[subscribe][company]" id="axisubs_subscribe_company"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div> -->*/
/*                     <!-- <div class="axisubs-billinfo-f-c">*/
/*                         <div class="axisubs-billinfo-f-i">*/
/*                             <div class="axisubs-billinfo-f-label">*/
/*                                 <label for="axisubs_subscribe_vat_number">*/
/*                                     Tax number*/
/*                                 </label>*/
/*                             </div>*/
/*                             <div class="axisubs-billinfo-f-field">*/
/*                                 {% if(subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_vat_number']) %}*/
/*                                     {% set vat_number = subscriber['meta'][subscriber['ID']~'_axisubs_subscribe_vat_number'] %}*/
/*                                 {% else %}*/
/*                                     {% set vat_number = userMeta[userPrefix~'vat_number'] %}*/
/*                                 {% endif %}*/
/*                                 <input type="text" value="{{ vat_number }}" name="axisubs[subscribe][vat_number]" id="axisubs_subscribe_vat_number"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div> -->*/
/*                 </div>*/
/*             </div>*/
/*             <div class="axisubs-register-message-con">*/
/*                 <div class="axisubs-register-message-text hide message">*/
/*                 </div>*/
/*             </div>*/
/*             <div class="axisubs-plan-payment-con">*/
/*                 {% if meta[id~'_axisubs_plans_type'] != 'free' %}*/
/*                 <div class="payment-method">*/
/*                   <div class="axisubs-plan_details-title">*/
/*                       <h3>Payment methods</h3>*/
/*                   </div>*/
/*                   {% endif %}*/
/*                   <input type="hidden" name="task" value="save"/>*/
/*                   <input type="hidden" name="id" value="{{ id }}"/>*/
/*                     {% if(data['upgrade']) %}*/
/*                         <input type="hidden" name="upgrade" value="{{ data['upgrade'] }}"/>*/
/*                     {% endif %}*/
/*                   <div class="axisubs-plan-payment-i-block">*/
/*                       {% if meta[id~'_axisubs_plans_type'] != 'free' %}*/
/*                           <div class="axisubs-plan-payment-block-con">*/
/*                               {{ data['paymentMethods'] | raw }}*/
/*                           </div>*/
/*                       {% endif %}*/
/*                       <div class="axisubs-plan-payment-button">*/
/*                           {% if(user_id) %}*/
/*                               <button type="button" class="btn-vacancyes" onclick="submitSubscriptions();">{{__('[:ru]Отправить[:ro]Trimite')}}</button>*/
/*                           {% else %}*/
/*                               <button type="button" class="btn-vacancyes" onclick="registerUser();">{{__('[:ru]Регистрация[:ro]Registrare')}}</button>*/
/*                           {% endif %}*/
/*                       </div>*/
/*                   </div>*/
/*                 </div>*/
/*             </div>*/
/*         </form>*/
/*     </div>*/
/*     <input type="hidden" id="site_url" value="{{ site_url }}"/>*/
/*     {% else %}*/
/*         <div class="axisubs-plan-notfound">*/
/*             Invalid Data*/
/*         </div>*/
/*     {% endif %}*/
/* </div>*/
/* */
