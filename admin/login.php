<!Doctype <!DOCTYPE html>
<html>
<head>
    
    <title>login</title>
    
</head>
<body style="">
<style>
h1{color: #ffaa3c;}
input{
    width:100%;
    padding: 16px 30px;
    border-radius: 40px;
    border: none;
}
form{
	border-radius: 50px;
background: #e0e0e0;
box-shadow:  5px -5px 10px #bebebe,
             -5px 5px 10px #ffffff;padding: 20px;
}
/* From Uiverse.io by vinodjangid07 */ 
.Btn-Container {
  display: flex;
  width: 100%;
  height: fit-content;
  background-color: #1d2129;
  border-radius: 40px;
  box-shadow: 0px 5px 10px #bebebe;
  justify-content: space-between;
  align-items: center;
  border: none;
  cursor: pointer;
}
.icon-Container {
  width: 45px;
  height: 45px;
  background-color: #ffaa3c;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  border: 3px solid #1d2129;
}
.text {
  width: calc(170px - 45px);
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 1.1em;
  letter-spacing: 1.2px;
}
.icon-Container svg {
  transition-duration: 1.5s;
}
.Btn-Container:hover .icon-Container svg {
  transition-duration: 1.5s;
  animation: arrow 1s linear infinite;
}
@keyframes arrow {
  0% {
    opacity: 0;
    margin-left: 0px;
  }
  100% {
    opacity: 1;
    margin-left: 10px;
  }
}

</style>
<br /><p><br /><p>
<center ><div style="width:30%; background-color:white; opacity:0.80; border-radius:10px;">
<br /><p><h1><b>Admin</b>-Login</h1>
<form method="POST" action="checkU&P.php">
<input type="text" name="username" placeholder="User Name" ><p>
<input type="password" name="password"  placeholder="password"><p>
     
<button class="Btn-Container">
  <span class="text">let's Login!</span>
  <span class="icon-Container">
    <svg
      width="16"
      height="19"
      viewBox="0 0 16 19"
      fill="nones"
      xmlns="http://www.w3.org/2000/svg"
    >
      <circle cx="1.61321" cy="1.61321" r="1.5" fill="black"></circle>
      <circle cx="5.73583" cy="1.61321" r="1.5" fill="black"></circle>
      <circle cx="5.73583" cy="5.5566" r="1.5" fill="black"></circle>
      <circle cx="9.85851" cy="5.5566" r="1.5" fill="black"></circle>
      <circle cx="9.85851" cy="9.5" r="1.5" fill="black"></circle>
      <circle cx="13.9811" cy="9.5" r="1.5" fill="black"></circle>
      <circle cx="5.73583" cy="13.4434" r="1.5" fill="black"></circle>
      <circle cx="9.85851" cy="13.4434" r="1.5" fill="black"></circle>
      <circle cx="1.61321" cy="17.3868" r="1.5" fill="black"></circle>
      <circle cx="5.73583" cy="17.3868" r="1.5" fill="black"></circle>
    </svg>
  </span>
</button>

</form>
<br /><p>
</div>
</center>
</body>
</html>