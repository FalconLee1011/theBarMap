<?php if (!empty($_POST)): ?>
    Welcome, <?php echo htmlspecialchars($_POST["name"]); ?>!<br>
    Your email is <?php echo htmlspecialchars($_POST["email"]); ?>.<br>
<?php endif; ?>

<style>
*{
  background-color: #222;
  color: #eee;
}
</style>

<script>
  function sbm(params) {
    document.getElementById("ddadadadaddadada").submit();
  }
</script>

<body>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="ddadadadaddadada">
      Name: <input type="text" name="name"><br>
      Email: <input type="text" name="email"><br>
      <input type="submit">
  </form>

  <div style="background-color: #0f0; height: 100px; width: 100px;" onclick="sbm()">
    
  </div>

  <h1>HELLOOOO!</h1>

  <?php if (!empty($_POST)): ?>
    <?php echo htmlspecialchars($_POST["name"]); ?><br>
    <?php echo htmlspecialchars($_POST["email"]); ?>
  <?php else: ?>
    AAA<br>
    BBB
  <?php endif; ?>

</body>
