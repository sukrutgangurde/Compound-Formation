var tl = gsap.timeline();

function time() {
  var a = 0;
  setInterval(function () {
    a = a + Math.floor(Math.random() * 20);
    if (a < 100) {
      document.querySelector("#loader h1").innerHTML = a + "%";
    } else {
      a = 100;
      document.querySelector("#loader h1").innerHTML = a + "%";
    }
  }, 150);
}

tl.to("#loader h1", {
  duration: 0.4,
  delay: 0.4,
  onStart: time(),
});

tl.to("#loader", {
  top: "-100vh",
  duration: 1,
  delay: 0.5,
});
