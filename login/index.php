<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bask Café Dashboard</title>
  <link rel="icon" type="image" href="../asset/favicon.jpg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
  <style>
      /* Reset and base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }
  
  body {
    background-color: #EFEBE2;
    color: #1A2916;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
  }
  
  .container {
    max-width: 400px;
    width: 100%;
  }
  
  .card {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(26, 41, 22, 0.2);
    overflow: hidden;
  }
  
  .card-header {
    padding: 1.5rem;
    text-align: center;
  }
  
  .logo {
    display: flex;
    justify-content: center;
    margin-bottom: 0.5rem;
  }
  
  .title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1A2916;
    margin-bottom: 0.5rem;
    font-family: 'Lobster', cursive;
  }
  
  .description {
    color: #1A2916;
    font-size: 0.875rem;
    font-family: 'Libre Baskerville', serif;
  }
  
  .card-content {
    padding: 0 1.5rem 1.5rem 1.5rem;
  }
  
  .form-group {
    margin-bottom: 1rem;
  }
  
  label {
    display: block;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #1A2916;
  }
  
  .label-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
  }
  
  .forgot-link {
    font-size: 0.75rem;
    color: #1A2916;
    text-decoration: none;
  }
  
  .forgot-link:hover {
    text-decoration: underline;
  }
  
  .input-wrapper {
    position: relative;
  }
  
  .input-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #1A2916;
  }
  
  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 0.625rem 0.75rem 0.625rem 2.5rem;
    border: 1px solid rgba(26, 41, 22, 0.2);
    border-radius: 6px;
    font-size: 0.875rem;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }
  
  input[type="email"]:focus,
  input[type="password"]:focus {
    border-color: #1A2916;
    box-shadow: 0 0 0 2px rgba(26, 41, 22, 0.2);
  }
  
  .checkbox-group {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding-left:30px;
  }
  
  .custom-checkbox {
    position: relative;
    width: 16px;
    height: 16px;
    margin-right: 8px;
    margin-top: 7px;
  }
  
  .custom-checkbox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }
  
  .checkbox-label {
    position: absolute;
    top: 0;
    left: 0;
    height: 16px;
    width: 16px;
    background-color: transparent;
    border: 1px solid rgba(26, 41, 22, 0.2);
    border-radius: 4px;
    cursor: pointer;
  }
  
  .custom-checkbox input:checked ~ .checkbox-label {
    background-color: #1A2916;
    border-color: #1A2916;
    padding-top:-10px;
  }
  
  .checkbox-label:after {
    content: "";
    position: absolute;
    display: none;
    left: 5px;
    top: 2px;
    width: 3px;
    height: 7px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
  }
  
  .custom-checkbox input:checked ~ .checkbox-label:after {
    display: block;
  }
  
  .remember-text {
    font-size: 0.875rem;
    color: #1A2916;
  }
  
  button {
    width: 100%;
    padding: 0.625rem;
    background-color: #1A2916;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.2s;
  }
  
  button:hover {
    background-color: rgba(26, 41, 22, 0.9);
  }
  
  button:disabled {
    opacity: 0.7;
    cursor: not-allowed;
  }
  
  .coffee-icon{
    width: 48px;
    height: 48px;
    stroke:#1A2916;
    fill: #1A2916;
  }

  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="logo">
          <svg class="coffee-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M88 0C74.7 0 64 10.7 64 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C120.5 112.3 128 119.9 128 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C119.5 47.7 112 40.1 112 24c0-13.3-10.7-24-24-24zM32 192c-17.7 0-32 14.3-32 32L0 416c0 53 43 96 96 96l192 0c53 0 96-43 96-96l16 0c61.9 0 112-50.1 112-112s-50.1-112-112-112l-48 0L32 192zm352 64l16 0c26.5 0 48 21.5 48 48s-21.5 48-48 48l-16 0 0-96zM224 24c0-13.3-10.7-24-24-24s-24 10.7-24 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C232.5 112.3 240 119.9 240 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C231.5 47.7 224 40.1 224 24z"/></svg>
        </div>
        <h1 class="title">Bask Café Dashboard</h1>
        <p class="description">Welcome back! Please sign in to continue</p>
      </div>
      
      <div class="card-content">
        <form action="login.php" method="POST">
          <div class="form-group">
            <label for="email">Email</label>
            <div class="input-wrapper">
              <input type="email" id="email" name="email" placeholder="AC.dev@gmail.com" required>
              <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                viewBox="0 0 24 24" fill="none" stroke="#1A2916" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
              </svg>
            </div>
          </div>
      
          <div class="form-group">
            <div class="label-row">
              <label for="password">Password</label>
            </div>
            <div class="input-wrapper">
              <input type="password" id="password" name="password" required>
              <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                viewBox="0 0 24 24" fill="none" stroke="#1A2916" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
              </svg>
            </div>
          </div>

      <div class="checkbox-group">
        <label class="custom-checkbox">
          <input type="checkbox" name="remember">
          <span class="checkbox-label"></span>
        </label>
        <span class="remember-text">Remember me</span>
      </div>
  
      <button type="submit">Login</button>
    </form>
  </div>
</div>
