<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box" style="width:860px;margin:0px auto;padding:0px auto;">
<div class="blank10"></div>
<div class="blank10"></div>

 <script type="text/javascript" LANGUAGE="javascript">
            <!--

           function check()
            {
                if(document.login_form.username.value.length==0){
                    alert("<?php echo lang(please_enter_your_user_name);?>");
                    document.login_form.username.focus();
                    return false;
                }

                if(document.login_form.password.value.length==0){
                    alert("<?php echo lang(please_set_a_password);?>");
                    document.login_form.password.focus();
                    return false;
                }

                if(document.login_form.password2.value.length==0){
                    alert("<?php echo lang(enter_confirm_password);?>");
                    document.login_form.password2.focus();
                    return false;
                }



                if(document.login_form.aquestion.value.length==0){
                    alert("<?php echo lang(set_security);?>");
                    document.login_form.aquestion.focus();
                    return false;
                }

                if(document.login_form.question.value.length==0){
                    alert("<?php echo lang(please_set_the_security_answer);?>");
                    document.login_form.question.focus();
                    return false;
                }

                if(document.login_form.answer.value.length==0){
                    alert("<?php echo lang(please_enter_the_custom_security_answer);?>");
                    document.login_form.answer.focus();
                    return false;
                }
                if(document.login_form.verify.value.length==0){
                    alert("<?php echo lang(enter);?><?php echo lang(verifycode);?>!");
                    document.login_form.verify.focus();
                    return false;
                }

             if(document.login_form.tel.value.length==0){
                    alert("<?php echo lang(p_m_content);?>");
                    document.login_form.tel.focus();
                    return false;
                }


            function set_question(value)
            {
                document.getElementById("question").value=value;
                document.getElementById("question").focus();
            }
            //-->



return true; 
} 
        </script>

<style>
table {background:url(<?php echo $skin_path;?>/re_bg.jpg) right bottom no-repeat;}
table tr td {height:38px;line-height:38px;font-size:14px;}

#tdLeft {width:180px;}
.input {
  width:282px;
  height:29px;
  line-height:29px;
  padding:0px 10px;
  background:url(<?php echo $skin_path;?>/images/input_bg.gif) left top no-repeat;
  border:none;
  font-size:12px;
}

#verify 
{
  width:39px;
  height:21px;
  line-height:21px;
  padding:0px 10px;
  background:url(<?php echo $skin_path;?>/images/input_bg_c.gif) left top no-repeat;
  border:none;
  font-size:12px;
}
</style>
    
            <form id="login_form"   name="login_form" method="post"  action="<?php echo url('user/register') ?>" onsubmit="return check()">
              
<strong style="font-size:14px;color:red;"><?php echo message();?></strong>
                                    <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                      <?php if(config::get(reg_on)) { ?>
                                        <tr>
                                            <td nowrap="nowrap" align="right" id="tdLeft">
                                               <?php echo lang(username);?>：
                                            </td>
                                            <td>
<input name="username" type="text" id="username" value="<?php echo get('username');?>" tabindex="1"  class="input" />
</td>
                                        </tr>
                                        <tr>
                                            <td style="height: 30px" align="right">
                                                <?php echo lang(password);?>：
                                            </td>
                                            <td style="height: 30px">
                                                <input name="password" type="password" id="password" value="<?php //echo $password;?>" tabindex="2" class="input" />
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td style="height: 30px" align="right"><?php echo lang(againpassword);?>：</td>
                                            <td><input type='password' id="password2"  name="password2" value="<?php //echo $password;?>" tabindex="3" class="input" />
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="height: 30px" align="right"><?php echo lang(question);?>：</td>
                                            <td>
                                                <select name="" style="width:180px;border:1px solid white;border-bottom:1px solid #CCC;" onchange="set_question(this.value);">
                                                    <option value="<?php echo lang(select_security);?>"><?php echo lang(select_security);?></option>
                                                    <option value="<?php echo lang(father_was_born);?>"><?php echo lang(father_was_born);?></option>
                                                    <option value="<?php echo lang(mother_was_born);?>"><?php echo lang(mother_was_born);?></option>
                                                    <option value="<?php echo lang(elementary_school_name);?>"><?php echo lang(elementary_school_name);?></option>
                                                    <option value="<?php echo lang(name_in_the_school);?>"><?php echo lang(name_in_the_school);?></option>
                                                    <option value="<?php echo lang(favorite_sport);?>"><?php echo lang(favorite_sport);?></option>
                                                    <option value="<?php echo lang(favorite_songs);?>"><?php echo lang(favorite_songs);?></option>
                                                    <option value="<?php echo lang(favorite_movies);?>"><?php echo lang(favorite_movies);?></option>
                                                    <option value="<?php echo lang(favorite_color);?>" ><?php echo lang(favorite_color);?></option>
                                                    <option value="<?php echo lang(custom_questions);?>" ><?php echo lang(custom_questions);?></option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr style="display:none;">
                                            <td style="height: 30px" align="right"></td>
                                            <td><input type='text' id="question"  name="question" value="" tabindex="3" class="input" />
                                            </td>
                                        </tr>
<tr>
                                        <td style="height: 30px" align="right"><?php echo lang(answer);?>：</td>
                                        <td>
                                            <input type='text' id="answer"  name="answer" value="" tabindex="3" class="input" /></td>
                                        </tr>

                                        <tr>
                                            <td style="height: 30px" align="right"><?php echo lang(e_mail);?>：</td>
                                            <td><input type='text' id="e_mail"  name="e_mail" value="" tabindex="3"  class="input" /></td>
                                        </tr>
<script type="text/javascript">
function isMobile(mobile){
return /^1([0-9]+){5,}$/g.test(mobile);
}
</script>
<tr>
                                            <td style="height: 30px" align="right"><?php echo lang(tel);?>：</td>
                                            <td><input type='text' id="tel"  name="tel" value="" tabindex="3"  class="input" /></td>
                                        </tr>
<tr>
                                            <td style="height: 30px" align="right"><?php echo lang(address);?>：</td>
                                            <td><input type='text' id="address"  name="address" value="" tabindex="3"  class="input" /></td>
                                        </tr>

                               
                                        <?php foreach($field as $f) { ?>
                                        <?php
                                        $name=$f['name'];
                                        if(!preg_match('/^my_/',$name)) {
                                        unset($field[$name]);
                                        continue;
                                       }
                                       if(!setting::$var['user'][$name]['showinreg']) {
                                         continue;
                                        }
                                        ?>
                                        <tr>
                                            <td style="height: 30px" align="right"><?php echo setting::$var['user'][$name]['cname']; ?>：</td>
                                            <td width="80%">
                                                <?php echo form::getform($name,setting::$var['user'],$field,array()); ?>
                                            </td>
                                        </tr>
                                        <?php } ?>


                                      <?php if(config::get('verifycode')){ ?>
                                        <tr>
                                            <td style="height: 30px" align="right">
                                               <?php echo lang(verifycode);?>：
                                            </td>
                                            <td style="height: 30px">
                                                <input type='text' id="verify"  tabindex="4"  name="verify" />&nbsp;<?php echo verify();?>
                                            </td>
                                        </tr>
                                        <?php  } ?>

                                        <tr>
                                            <td style="height: 30px" align="right">

                                            </td>
                                            <td style="height: 30px" nowrap="nowrap">

                                                <input type="submit" name="submit" value=" <?php echo lang(register);?> " class="button"   />
                                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url('user/getpass');?>"><?php echo lang(findpassword);?></a>&nbsp;&nbsp;<a href="<?php echo url('user/login');?>"><?php echo lang(login);?></a>
                                                </td>
                                        </tr>
                                        <?php } else { ?>
                                        <tr style="font-weight:bold;">
                                            <td style="height: 30px" align="right"><?php echo lang(tips);?>：</td>
                                            <td style="color:red;"><?php echo lang(sitecloseregister);?></td>
                                        </tr>

                                        <?php } ?>


                                    </table>
</form>

<div class="blank10"></div>
<div class="blank10"></div>
</div>
<?php echo template('footer.html'); ?>