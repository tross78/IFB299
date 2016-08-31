<html>

  <head>

    <style>
      ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #E5C111;
        }

        li {
          float: left;
          border-right: 1px solid #EADB8E;
        }

        li:last-child {
          border-left: 1px solid #EADB8E;
        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 16px 20px;
          font-size: 18px;
          text-decoration: none;
        }

        li a:hover {
          background-color: #463C07;
        }

        body {
          background-color: #FDF5CD;
        }

        .loginButton {
          background-color: #E5C111;
          border: none;
          color: white;
          padding: 16px 25px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }

        .loginButton:hover {
          background-color: #463C07;
        }

      </style>

    </head>

    <body>

      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Course Registration</a></li>
        <li style = "float:right"> <a href="#">Log In / Register</a></li>
      </ul>

      <form>
        <p> <input type="text" placeholder="Email"/></p>
        <p> <input type="password" placeholder="Password"/></p>
        <button class = "loginButton"><a href = "#" style='text-decoration:none;'>Log In</a></button>
      </form>

      <form>
        <p><b> Not registered? Create an account</b></p><br>
        <p> Please enter your information below </p>
        <p> <input type="text" placeholder="First name"/>
            <input type="text" placeholder="Surname"/>
        </p>
        <p> <input type="text" placeholder="Email address"/></p>
        <p> <input type="password" placeholder="New password"/></p>
        <p> Date of Birth </p>
        <p>
          <select>
            <option value="january">January</option>
            <option value="february">February</option>
            <option value="march">March</option>
            <option value="april">April</option>
            <option value="may">May</option>
            <option value="june">June</option>
            <option value="july">July</option>
            <option value="august">August</option>
            <option value="september">September</option>
            <option value="october">October</option>
            <option value="november">November</option>
            <option value="december">December</option>
          </select>
            <input type="day" placeholder="Day" maxlength="2"/>
            <input type="year" placeholder="Year" maxlength ="4"/>
        </p>
        <p>
          <input type = "radio" name = "gender" value = "Female">Female
          <input type = "radio" name = "gender" value= "Male">Male
        </p>

        <button class = "loginButton"><a href = "#" style='text-decoration:none;'>Create Account</a></button>
      </form>

    </body>

</html>
