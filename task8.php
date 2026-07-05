<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Brain Buzz — Live Quiz</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#0f0c29;
    --stage:#171340;
    --card:#1e1b4b;
    --gold:#f5b942;
    --magenta:#ff4d8d;
    --cream:#f8f5ec;
    --muted:#a9a3d6;
    --green:#4ade80;
    --red:#fb5b5b;
  }
  *{box-sizing:border-box;}
  html,body{margin:0;padding:0;}
  body{
    min-height:100vh;
    background:
      radial-gradient(circle at 20% 10%, rgba(255,77,141,0.10), transparent 45%),
      radial-gradient(circle at 85% 85%, rgba(245,185,66,0.10), transparent 40%),
      var(--bg);
    font-family:'Space Grotesk', sans-serif;
    color:var(--cream);
    display:flex;
    align-items:center;
    justify-content:center;
    padding:24px;
  }
  .screen{ width:100%; max-width:640px; }
  .hidden{ display:none !important; }

  /* ---------- Marquee title ---------- */
  .marquee-wrap{
    position:relative;
    border-radius:20px;
    padding:6px;
    background:linear-gradient(135deg, var(--gold), var(--magenta), var(--gold));
    background-size:300% 300%;
    animation:chase 6s linear infinite;
    margin-bottom:28px;
  }
  @keyframes chase{
    0%{background-position:0% 50%;}
    100%{background-position:300% 50%;}
  }
  .marquee-inner{
    background:var(--stage);
    border-radius:16px;
    padding:34px 20px 26px;
    text-align:center;
    position:relative;
    overflow:hidden;
  }
  .bulbs{
    position:absolute; inset:0;
    pointer-events:none;
  }
  .bulb{
    position:absolute;
    width:6px;height:6px;
    border-radius:50%;
    background:var(--gold);
    box-shadow:0 0 6px 2px rgba(245,185,66,0.7);
    animation:twinkle 1.4s infinite ease-in-out;
  }
  @keyframes twinkle{
    0%,100%{opacity:.25; transform:scale(0.8);}
    50%{opacity:1; transform:scale(1.2);}
  }
  h1.title{
    font-family:'Bebas Neue', sans-serif;
    font-size:clamp(2.4rem, 8vw, 3.6rem);
    letter-spacing:3px;
    margin:0;
    color:var(--gold);
    text-shadow:0 0 18px rgba(245,185,66,0.35);
  }
  .subtitle{
    color:var(--muted);
    font-size:0.95rem;
    margin-top:6px;
    letter-spacing:0.5px;
  }

  /* ---------- Cards / stage ---------- */
  .card{
    background:var(--card);
    border-radius:16px;
    padding:28px;
    box-shadow:0 20px 40px rgba(0,0,0,0.35);
  }
  label{
    display:block;
    font-size:0.75rem;
    letter-spacing:1.5px;
    text-transform:uppercase;
    color:var(--muted);
    margin-bottom:8px;
  }
  input[type=text]{
    width:100%;
    padding:14px 16px;
    border-radius:10px;
    border:2px solid #34305f;
    background:#12102f;
    color:var(--cream);
    font-family:'Space Grotesk', sans-serif;
    font-size:1.05rem;
    outline:none;
    transition:border-color .2s;
  }
  input[type=text]:focus{ border-color:var(--gold); }
  .hint{ color:var(--muted); font-size:0.8rem; margin-top:8px; }

  .btn{
    appearance:none;
    border:none;
    cursor:pointer;
    font-family:'Space Grotesk', sans-serif;
    font-weight:600;
    letter-spacing:0.5px;
    border-radius:10px;
    padding:14px 22px;
    font-size:1rem;
    transition:transform .15s ease, box-shadow .15s ease, opacity .15s ease;
  }
  .btn:focus-visible{ outline:3px solid var(--gold); outline-offset:2px; }
  .btn-primary{
    width:100%;
    margin-top:20px;
    background:linear-gradient(135deg, var(--gold), #ffd27a);
    color:#241a00;
    box-shadow:0 8px 20px rgba(245,185,66,0.25);
  }
  .btn-primary:hover{ transform:translateY(-2px); box-shadow:0 12px 24px rgba(245,185,66,0.35); }
  .btn-primary:disabled{ opacity:0.4; cursor:not-allowed; transform:none; box-shadow:none; }

  .btn-ghost{
    background:transparent;
    color:var(--cream);
    border:2px solid #34305f;
  }
  .btn-ghost:hover{ border-color:var(--gold); color:var(--gold); }

  /* ---------- Quiz header ---------- */
  .quiz-top{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:18px;
  }
  .eyebrow{
    font-size:0.75rem;
    letter-spacing:2px;
    text-transform:uppercase;
    color:var(--magenta);
    font-weight:700;
  }
  .qcount{ color:var(--muted); font-size:0.85rem; margin-top:2px;}
  .timer-ring{
    position:relative;
    width:58px; height:58px;
  }
  .timer-ring svg{ transform:rotate(-90deg); width:58px; height:58px; }
  .timer-ring circle{
    fill:none;
    stroke-width:5;
  }
  .ring-bg{ stroke:#2c2860; }
  .ring-fg{ stroke:var(--gold); stroke-linecap:round; transition:stroke-dashoffset 1s linear, stroke .2s;}
  .timer-num{
    position:absolute; inset:0;
    display:flex; align-items:center; justify-content:center;
    font-weight:700; font-size:1rem;
  }

  /* progress bulbs */
  .progress{
    display:flex; gap:6px; margin-bottom:22px; flex-wrap:wrap;
  }
  .progress .dot{
    width:14px; height:14px; border-radius:50%;
    background:#2c2860; border:2px solid #3b366f;
    transition:all .2s;
  }
  .progress .dot.done-correct{ background:var(--green); border-color:var(--green); }
  .progress .dot.done-wrong{ background:var(--red); border-color:var(--red); }
  .progress .dot.current{ box-shadow:0 0 0 3px rgba(245,185,66,0.35); border-color:var(--gold); }

  .question-text{
    font-size:1.35rem;
    font-weight:600;
    line-height:1.4;
    margin:6px 0 22px;
  }

  .answers{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px;
  }
  @media (max-width:480px){ .answers{ grid-template-columns:1fr; } }

  .answer-btn{
    text-align:left;
    background:#151235;
    border:2px solid #302c5e;
    color:var(--cream);
    border-radius:12px;
    padding:16px 16px;
    font-size:0.98rem;
    font-family:'Space Grotesk', sans-serif;
    cursor:pointer;
    display:flex;
    align-items:center;
    gap:10px;
    transition:transform .12s ease, border-color .12s ease, background .12s ease;
  }
  .answer-btn .letter{
    flex:0 0 auto;
    width:26px; height:26px;
    border-radius:50%;
    background:#2c2860;
    display:flex; align-items:center; justify-content:center;
    font-size:0.8rem; font-weight:700; color:var(--gold);
  }
  .answer-btn:hover:not(:disabled){ transform:translateY(-2px); border-color:var(--gold); }
  .answer-btn:disabled{ cursor:default; }
  .answer-btn.correct{ background:rgba(74,222,128,0.15); border-color:var(--green); }
  .answer-btn.correct .letter{ background:var(--green); color:#0b1f14; }
  .answer-btn.wrong{ background:rgba(251,91,91,0.15); border-color:var(--red); }
  .answer-btn.wrong .letter{ background:var(--red); color:#2a0b0b; }

  .fact-box{
    margin-top:18px;
    background:#12102f;
    border-left:4px solid var(--gold);
    padding:12px 14px;
    border-radius:8px;
    font-size:0.9rem;
    color:var(--muted);
    display:none;
  }
  .fact-box.show{ display:block; }

  .quiz-footer{
    display:flex;
    justify-content:flex-end;
    margin-top:22px;
  }
  .quiz-footer .btn{ min-width:140px; }

  /* ---------- Results ---------- */
  .score-big{
    font-family:'Bebas Neue', sans-serif;
    font-size:4.2rem;
    text-align:center;
    color:var(--gold);
    margin:6px 0 0;
    letter-spacing:2px;
  }
  .score-sub{ text-align:center; color:var(--muted); margin-bottom:22px; }
  .tier{
    text-align:center;
    font-weight:700;
    font-size:1.2rem;
    margin-bottom:22px;
    color:var(--magenta);
  }
  .review-item{
    display:flex; gap:10px;
    padding:10px 0;
    border-bottom:1px solid #2c2860;
    font-size:0.88rem;
  }
  .review-item:last-child{ border-bottom:none; }
  .tag{
    flex:0 0 auto;
    width:20px; height:20px;
    border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    font-size:0.7rem; font-weight:800;
    margin-top:2px;
  }
  .tag.ok{ background:var(--green); color:#0b1f14; }
  .tag.no{ background:var(--red); color:#2a0b0b; }
  .review-q{ color:var(--cream); }
  .review-a{ color:var(--muted); margin-top:2px; }

  .actions-row{ display:flex; gap:12px; margin-top:24px; }
  .actions-row .btn{ flex:1; margin-top:0; }

  @media (prefers-reduced-motion: reduce){
    .marquee-wrap, .bulb{ animation:none !important; }
  }
</style>
</head>
<body>

<div class="screen" id="login-screen">
  <div class="marquee-wrap">
    <div class="marquee-inner">
      <div class="bulbs" id="bulbs"></div>
      <h1 class="title">BRAIN BUZZ</h1>
      <div class="subtitle">Twelve questions. One spotlight. Step up.</div>
    </div>
  </div>
  <div class="card">
    <label for="player-name">Your name on the marquee</label>
    <input type="text" id="player-name" placeholder="e.g. Sanmathi" autocomplete="off" maxlength="24">
    <div class="hint">No password needed — just tell us who's taking the stage.</div>
    <button class="btn btn-primary" id="start-btn" disabled>Take the Stage</button>
  </div>
</div>

<div class="screen hidden" id="quiz-screen">
  <div class="card">
    <div class="quiz-top">
      <div>
        <div class="eyebrow" id="q-category">Category</div>
        <div class="qcount" id="q-count">Question 1 of 12</div>
      </div>
      <div class="timer-ring">
        <svg viewBox="0 0 58 58">
          <circle class="ring-bg" cx="29" cy="29" r="25"></circle>
          <circle class="ring-fg" id="ring-fg" cx="29" cy="29" r="25"></circle>
        </svg>
        <div class="timer-num" id="timer-num">15</div>
      </div>
    </div>

    <div class="progress" id="progress"></div>

    <div class="question-text" id="question-text"></div>
    <div class="answers" id="answers"></div>

    <div class="fact-box" id="fact-box"></div>

    <div class="quiz-footer">
      <button class="btn btn-primary" id="next-btn" style="max-width:160px;" disabled>Next Question</button>
    </div>
  </div>
</div>

<div class="screen hidden" id="results-screen">
  <div class="marquee-wrap">
    <div class="marquee-inner">
      <div class="bulbs" id="bulbs2"></div>
      <div class="subtitle" id="results-name">Final Score</div>
      <div class="score-big" id="score-big">0 / 12</div>
    </div>
  </div>
  <div class="card">
    <div class="tier" id="tier-text"></div>
    <div id="review-list"></div>
    <div class="actions-row">
      <button class="btn btn-ghost" id="restart-btn">Play Again</button>
    </div>
  </div>
</div>

<script>
  // ---------- Data ----------
  const QUESTIONS = [
    { category:"Science", q:"Which planet is known as the Red Planet?",
      options:["Venus","Mars","Jupiter","Saturn"], answer:1,
      fact:"Mars looks red because its surface is covered in iron oxide — literally rust." },
    { category:"Geography", q:"Which is the largest ocean on Earth?",
      options:["Atlantic","Indian","Arctic","Pacific"], answer:3,
      fact:"The Pacific Ocean covers more area than all of Earth's land combined." },
    { category:"History", q:"In which year did World War II end?",
      options:["1943","1944","1945","1946"], answer:2,
      fact:"WWII ended in 1945 after Japan's formal surrender in September." },
    { category:"Technology", q:"What does HTTP stand for?",
      options:["HyperText Transfer Protocol","High Text Transmission Process","Hyperlink Tool Transfer Program","Home Tool Transfer Protocol"], answer:0,
      fact:"HTTP was created by Tim Berners-Lee in 1989 to power the World Wide Web." },
    { category:"Pop Culture", q:"What is the name of the wizarding school in Harry Potter?",
      options:["Beauxbatons","Durmstrang","Hogwarts","Ilvermorny"], answer:2,
      fact:"Hogwarts was reportedly founded over a thousand years ago in the books' lore." },
    { category:"Mathematics", q:"What is the square root of 144?",
      options:["10","11","12","13"], answer:2,
      fact:"12 × 12 = 144, making 12 a 'perfect square' root." },
    { category:"Literature", q:"Who wrote 'Pride and Prejudice'?",
      options:["Emily Brontë","Jane Austen","Virginia Woolf","Mary Shelley"], answer:1,
      fact:"Jane Austen originally titled the novel 'First Impressions'." },
    { category:"Sports", q:"How many players are on the field for one football (soccer) team?",
      options:["9","10","11","12"], answer:2,
      fact:"That's 11 players including the goalkeeper — 22 total on the pitch." },
    { category:"Science", q:"What is the chemical symbol for gold?",
      options:["Gd","Go","Au","Ag"], answer:2,
      fact:"'Au' comes from the Latin word for gold, 'aurum'." },
    { category:"Geography", q:"Which is the smallest country in the world by area?",
      options:["Monaco","San Marino","Vatican City","Liechtenstein"], answer:2,
      fact:"Vatican City is just about 0.44 square kilometers — smaller than most parks." },
    { category:"Technology", q:"Who is widely regarded as the 'father of the computer'?",
      options:["Alan Turing","Charles Babbage","Ada Lovelace","Nikola Tesla"], answer:1,
      fact:"Charles Babbage designed the Analytical Engine in the 1830s, a mechanical precursor to modern computers." },
    { category:"Nature", q:"What is the fastest land animal?",
      options:["Lion","Pronghorn","Cheetah","Greyhound"], answer:2,
      fact:"A cheetah can hit about 100–120 km/h in short bursts while hunting." }
  ];

  const TIME_PER_Q = 15;

  // ---------- State ----------
  let playerName = "";
  let current = 0;
  let score = 0;
  let timerInterval = null;
  let timeLeft = TIME_PER_Q;
  let answered = false;
  const log = []; // {correct: bool, chosenText, correctText}

  // ---------- Bulb decoration ----------
  function scatterBulbs(containerId, count){
    const el = document.getElementById(containerId);
    if(!el) return;
    el.innerHTML = "";
    for(let i=0;i<count;i++){
      const b = document.createElement("div");
      b.className = "bulb";
      const edge = Math.floor(Math.random()*4);
      let top, left;
      if(edge===0){ top="4px"; left = Math.random()*94+"%"; }
      else if(edge===1){ top = Math.random()*90+"%"; left="4px"; }
      else if(edge===2){ top = Math.random()*90+"%"; left = "94%"; }
      else { top="90%"; left = Math.random()*94+"%"; }
      b.style.top = top; b.style.left = left;
      b.style.animationDelay = (Math.random()*1.4)+"s";
      el.appendChild(b);
    }
  }
  scatterBulbs("bulbs", 22);
  scatterBulbs("bulbs2", 22);

  // ---------- Login ----------
  const nameInput = document.getElementById("player-name");
  const startBtn = document.getElementById("start-btn");
  nameInput.addEventListener("input", ()=>{
    startBtn.disabled = nameInput.value.trim().length === 0;
  });
  nameInput.addEventListener("keydown", (e)=>{
    if(e.key === "Enter" && !startBtn.disabled) startQuiz();
  });
  startBtn.addEventListener("click", startQuiz);

  function startQuiz(){
    playerName = nameInput.value.trim() || "Player";
    document.getElementById("login-screen").classList.add("hidden");
    document.getElementById("quiz-screen").classList.remove("hidden");
    buildProgress();
    renderQuestion();
  }

  // ---------- Progress dots ----------
  function buildProgress(){
    const p = document.getElementById("progress");
    p.innerHTML = "";
    QUESTIONS.forEach((_, i)=>{
      const d = document.createElement("div");
      d.className = "dot";
      d.id = "dot-"+i;
      p.appendChild(d);
    });
  }
  function updateProgress(){
    QUESTIONS.forEach((_, i)=>{
      const d = document.getElementById("dot-"+i);
      d.classList.remove("current","done-correct","done-wrong");
      if(i < log.length){
        d.classList.add(log[i].correct ? "done-correct" : "done-wrong");
      } else if(i === current){
        d.classList.add("current");
      }
    });
  }

  // ---------- Timer ring ----------
  const RADIUS = 25;
  const CIRC = 2 * Math.PI * RADIUS;
  const ringFg = document.getElementById("ring-fg");
  ringFg.style.strokeDasharray = CIRC;

  function startTimer(){
    clearInterval(timerInterval);
    timeLeft = TIME_PER_Q;
    updateRing();
    timerInterval = setInterval(()=>{
      timeLeft--;
      updateRing();
      if(timeLeft <= 0){
        clearInterval(timerInterval);
        if(!answered) lockAnswer(-1); // time's up, no selection
      }
    }, 1000);
  }
  function updateRing(){
    const frac = Math.max(timeLeft,0) / TIME_PER_Q;
    ringFg.style.strokeDashoffset = CIRC * (1 - frac);
    ringFg.style.stroke = timeLeft <= 5 ? "var(--red)" : "var(--gold)";
    document.getElementById("timer-num").textContent = Math.max(timeLeft,0);
  }

  // ---------- Render question ----------
  function renderQuestion(){
    answered = false;
    const item = QUESTIONS[current];
    document.getElementById("q-category").textContent = item.category;
    document.getElementById("q-count").textContent = `Question ${current+1} of ${QUESTIONS.length}`;
    document.getElementById("question-text").textContent = item.q;
    document.getElementById("fact-box").classList.remove("show");
    document.getElementById("fact-box").textContent = "";
    document.getElementById("next-btn").disabled = true;
    document.getElementById("next-btn").textContent = current === QUESTIONS.length-1 ? "See Results" : "Next Question";

    const answersEl = document.getElementById("answers");
    answersEl.innerHTML = "";
    const letters = ["A","B","C","D"];
    item.options.forEach((opt, idx)=>{
      const btn = document.createElement("button");
      btn.className = "answer-btn";
      btn.innerHTML = `<span class="letter">${letters[idx]}</span><span>${opt}</span>`;
      btn.addEventListener("click", ()=> lockAnswer(idx));
      answersEl.appendChild(btn);
    });

    updateProgress();
    startTimer();
  }

  function lockAnswer(chosenIdx){
    if(answered) return;
    answered = true;
    clearInterval(timerInterval);
    const item = QUESTIONS[current];
    const buttons = document.querySelectorAll(".answer-btn");
    const isCorrect = chosenIdx === item.answer;
    if(isCorrect) score++;

    buttons.forEach((b, idx)=>{
      b.disabled = true;
      if(idx === item.answer) b.classList.add("correct");
      else if(idx === chosenIdx) b.classList.add("wrong");
    });

    log.push({
      correct: isCorrect,
      question: item.q,
      chosenText: chosenIdx === -1 ? "No answer (time's up)" : item.options[chosenIdx],
      correctText: item.options[item.answer]
    });

    const factBox = document.getElementById("fact-box");
    factBox.textContent = "💡 " + item.fact;
    factBox.classList.add("show");

    document.getElementById("next-btn").disabled = false;
    updateProgress();
  }

  document.getElementById("next-btn").addEventListener("click", ()=>{
    current++;
    if(current >= QUESTIONS.length){
      showResults();
    } else {
      renderQuestion();
    }
  });

  // ---------- Results ----------
  function showResults(){
    document.getElementById("quiz-screen").classList.add("hidden");
    document.getElementById("results-screen").classList.remove("hidden");
    document.getElementById("results-name").textContent = playerName + "'s Final Score";
    document.getElementById("score-big").textContent = `${score} / ${QUESTIONS.length}`;

    const pct = score / QUESTIONS.length;
    let tier;
    if(pct === 1) tier = "🏆 Flawless — Certified Genius!";
    else if(pct >= 0.75) tier = "🌟 Great job — the spotlight suits you.";
    else if(pct >= 0.5) tier = "👍 Solid effort — halfway to stardom.";
    else tier = "🔁 Take a bow and try again!";
    document.getElementById("tier-text").textContent = tier;

    const list = document.getElementById("review-list");
    list.innerHTML = "";
    log.forEach((item, i)=>{
      const row = document.createElement("div");
      row.className = "review-item";
      row.innerHTML = `
        <div class="tag ${item.correct ? 'ok':'no'}">${item.correct ? '✓':'✕'}</div>
        <div>
          <div class="review-q">${i+1}. ${item.question}</div>
          <div class="review-a">Your answer: ${item.chosenText}${item.correct ? "" : " — Correct: " + item.correctText}</div>
        </div>`;
      list.appendChild(row);
    });
  }

  document.getElementById("restart-btn").addEventListener("click", ()=>{
    current = 0; score = 0; log.length = 0;
    document.getElementById("results-screen").classList.add("hidden");
    document.getElementById("login-screen").classList.remove("hidden");
    nameInput.value = "";
    startBtn.disabled = true;
  });
</script>
</body>
</html>