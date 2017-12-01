<?php
    include_once("config.php");
?>

<section>				
    <div id="container_demo" >
        <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>
        <div id="wrapper">
            <div id="login" class="animate form">
                <form  action="includes/doLogin.php" method="post" autocomplete="on"> 
                    <h1>Log in</h1> 
                    <p> 
                        <label for="username" class="uname" data-icon="u" > Your Username </label>
                        <input id="username" name="username" required="required" type="text" placeholder="Username"/>
                    </p>
                    <p> 
                        <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                        <input id="password" name="password" required="required" type="password" placeholder="Password" /> 
                    </p>
                    <p class="login button"> 
                        <input type="submit" value="Login" />
                        <a href="includes/forgotPass.php"><input style="float: left;" type="button" value="Forgot Pass" /> </a>
					</p>
                    <p class="change_link">
						Not a member yet ?
						<a href="#toregister" class="to_register">Join us</a>
					</p>
                </form>
            </div>