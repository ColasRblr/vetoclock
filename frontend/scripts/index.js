const textAnim = document.querySelector("h1");

new Typewriter(textAnim, {
  deleteSpeed: 60,
})
  .changeDelay(60)
  .typeString("Vet O'Clock")
  .pauseFor(400)
  .typeString(", l'appli qui facilite la communication <br>")
  .pauseFor(200)
  .typeString(" entre les vétérinaires et leur clientèle")
  .pauseFor(600)
  .typeString(".")
  .start();
