<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box" style="width:860px;margin:0px auto;padding:0px auto;">
<div class="blank10"></div>
<div class="blank10"></div>

<script type="text/javascript">

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
</script>
<style>
table {background:url(<?php echo $skin_path;?>/l_bg.jpg) right bottom no-repeat;}
table tr td {height:38px;line-height:38px;font-size:14px;}
.input {width:170px;height:28px;line-height:28px;padding-left:10px;border:1px solid white;border-bottom:1px solid #CCC;}
#tdLeft {width:180px;}
</style>


<form id="login_form"   name="loginform" method="post"  action="<?php echo url('user/getpass') ?>">
<input name="step" type="hidden" value="1">
                <table width="90%" border="0" cellspacing="0" cellpadding="0">
 <tr>
<td style="height: 30px; padding-right:15px; font-weight:bold; color:green" align="right"><?php echo lang(getpassword);?></td>
<td>
</td>
</tr>
                                        <tr>
                                            <td nowrap="nowrap" align="right" id="tdLeft">
                                               <?php echo lang(username);?>：
                                            </td>
                                            <td>
<input name="username" type="text" id="username" value="" tabindex="1"  class="input" />
</td>
                                        </tr>

                                        <tr>
                                            <td style="height: 30px" align="right">
                                                <?php echo lang(verifycode);?>：
                                            </td>
                                            <td style="height: 30px">
                                                <input type='text' id="verify"  tabindex="4"  name="verify" class="input" style="width:100px;" />&nbsp;<?php echo verify();?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="height: 30px" align="right">

                                            </td>
                                            <td style="height: 30px" nowrap="nowrap">
<input type="submit" name="submit" value=" <?php echo lang(nextstep);?> " class="button"   />
                                                </td>
                                        </tr>


                                    </table>
</form>
<div class="blank10"></div>
<div class="blank10"></div>
</div>
<?php echo template('footer.html'); ?>