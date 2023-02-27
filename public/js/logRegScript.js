const loginText = document.querySelector(".title-text .login");
      // Submit form login
      const loginForm = document.querySelector("form.login");
      // Pindah Login
      const loginBtn = document.querySelector("label.login");
      // Pindah SignUp
      const signupBtn = document.querySelector("label.signup");
      // Submit form signup
      const signupLink = document.querySelector("form .signup-link a");

      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });


      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });