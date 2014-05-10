<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>

<div class="box" style="width:860px;margin:0px auto;padding:0px auto;">
<div class="blank10"></div>
<div class="blank10"></div>
<script type="text/javascript" LANGUAGE="javascript">
            <!--

        function check()
            {
                if(document.loginform.username.value.length==0){
                    alert("<?php echo lang(please_enter_your_user_name);?>");
                    document.loginform.username.focus();
                    return false;
                }

                if(document.loginform.password.value.length==0){
                    alert("<?php echo lang(please_set_a_password);?>");
                    document.loginform.password.focus();
                    return false;
                }

                if(document.loginform.password2.value.length==0){
                    alert("<?php echo lang(enter_confirm_password);?>");
                    document.loginform.password2.focus();
                    return false;
                }

                if(document.loginform.aquestion.value.length==0){
                    alert("<?php echo lang(set_security);?>");
                    document.loginform.aquestion.focus();
                    return false;
                }

                if(document.loginform.question.value.length==0){
                    alert("<?php echo lang(please_set_the_security_answer);?>");
                    document.loginform.question.focus();
                    return false;
                }

                if(document.loginform.answer.value.length==0){
                    alert("<?php echo lang(please_enter_the_custom_security_answer);?>");
                    document.loginform.answer.focus();
                    return false;
                }
                if(document.loginform.verify.value.length==0){
                    alert("<?php echo lang(enter);?><?php echo lang(verifycode);?>!");
                    document.loginform.verify.focus();
                    return false;
                }


            }


            function set_question(value)
            {
                document.getElementById("question").value=value;
                document.getElementById("question").focus();
            }
            //-->
        </script>

<style>
table {background:url(<?php echo $skin_path;?>/l_bg.jpg) right bottom no-repeat;}
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
    
   <form id="login_form"   name="loginform" method="post"  action="<?php echo url('user/login') ?>" onsubmit="return check()">
<input type='hidden' id="from"  name="from" value="<?php echo get('from')? get('from'):front::$from;?>"/>
                <table width="90%" border="0" cellspacing="0" cellpadding="0">
<?php if(isset($message)) { ?>                
              <tr><td colspan="2"><?php echo $message;?></td></tr>
<?php } else { ?>
                                        <tr><td colspan="2">&nbsp;</td></tr>
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

                                                <input type="submit" name="submit" value=" <?php echo lang(login);?> " class="button"   />
                                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url('user/getpass');?>"><?php echo lang(findpassword);?></a>&nbsp;&nbsp;<a href="<?php echo url('user/register');?>"><?php echo lang(register);?></a>
                                                </td>
                                        </tr>
                                


                                        <?php } ?>


                                    </table>
</form>
<div class="blank10"></div>
<div class="blank10"></div>
</div>
<?php echo template('footer.html'); ?>