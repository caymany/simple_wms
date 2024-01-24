<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/header.css">
  <title>Flexbox Dropdown Menu</title>
</head>

<body>
  <nav id="main-nav">
    <ul>
      <li>
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#">Services
          <span class="arrow">&#x25BC;</span>
        </a>
        <ul class="submenu">
          <li>
            <a href="#">Android Dev</a>
          </li>
          <li>
            <a href="#">iOS Dev</a>
          </li>
          <li>
            <a href="#">Web Dev
              <span class="arrow">&#x25B6;</span>
            </a>
            <ul class="submenu-2">
              <li>
                <a href="#">Node.js</a>
              </li>
              <li>
                <a href="#">PHP</a>
              </li>
              <li>
                <a href="#">Python</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li>
        <a href="#">Downloads</a>
      </li>
      <li>
        <a href="#">FAQs
          <span class="arrow">&#x25BC;</span>
        </a>
        <ul class="submenu">
          <li>
            <a href="#">Android</a>
          </li>
          <li>
            <a href="#">iOS</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#">About</a>
      </li>
    </ul>
  </nav>
</body>

</html>