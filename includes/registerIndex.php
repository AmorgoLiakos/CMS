
  <div id="register" class="animate form">
                            <form  action="includes/doRegister.php" method="post" enctype="multipart/form-data" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="nameSignUp" class="uname" data-icon="u">Your name</label>
                                    <input id="nameSignUp" name="name" required="required" type="text" placeholder="Name" />
                                </p>
                                <p> 
                                    <label for="surnameSignup" class="uname" data-icon="u">Your surname</label>
                                    <input id="surnameSignup" name="surname" required="required" type="text" placeholder="Surname" />
                                </p>                      
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="Username" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="email" required="required" type="email" placeholder="Email"/> 
                                </p>
                                <p> 
                                    <label for="profPic" class="uname" data-icon="u">Your Profile Picture</label>
                                    <input id="profPic" name="profPic" required="required" type="file" placeholder="Profile Picture" />
                                </p>                                
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordSignup" name="password" required="required" type="password" placeholder="Password" />
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="confirmPassword" required="required" type="password" placeholder="Confirm Password"/>
                                </p>                                
                                <p class="signin button"> 
									<input type="submit" name="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>