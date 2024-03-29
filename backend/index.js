const express = require("express");
const app = express();
const port = 3000;

app.all("*", function (req, res) {
  res.redirect(`https://${process.env.REDIRECT_HOST}`);
});

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`);
});
