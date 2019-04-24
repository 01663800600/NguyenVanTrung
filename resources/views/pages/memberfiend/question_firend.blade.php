@extends('masterfriend')


@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="">Home</a>
  </li>
  <li class="breadcrumb-item active">Back <a href="friend/id=10000{{$info_friend['id_user'] }}">{{$info_friend['name'] }}</a></li>  
  <li class="breadcrumb-item active">Chương : {{ $name_chapter['chapter_name'] }} - {{ $name_chapter['chapter_item'] }}</li>  
</ol>

<div class="card mb-3">
  <div class="card-header">
    Xem Đáp án List question của {{ $info_friend['name'] }}: <a href="list-friend-question/friend=8F{{$info_friend['id_user'] }}41T{{ $idmatrixfriend  }}">{{ $name_chapter['chapter_item'] }} </a> </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <style type="text/css">

  body{
            font-family: 'Work Sans', sans-serif;
            color: #333;
            font-weight: 300;
            text-align: center;
            background-color: #30B4C3;
          }
          h1{
            font-weight: 300;
            margin: 0px;
            padding: 10px;
            font-size: 20px;
            background-color: #444;
            color: #fff;
          }
          .question{
            font-size: 30px;
            margin-bottom: 10px;
          }
          .answers {
            margin-bottom: 20px;
            text-align: left;
            display: inline-block;
          }
          .answers label{
            display: block;
            margin-bottom: 10px;
          }
          button{
            font-family: 'Work Sans', sans-serif;
            font-size: 22px;
            background-color: #279;
            color: #fff;
            border: 0px;
            border-radius: 3px;
            padding: 20px;
            cursor: pointer;
          }
          button:hover{
            background-color: #38a;
          }
          .slide{
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            z-index: 1;
            opacity: 0;
            transition: opacity 0.5s;
          }
          .active-slide{
            opacity: 1;
            z-index: 2;
          }
          .quiz-container{
            position: relative;
            height: 200px;
            margin-top: 40px;
          }


        </style>

        <h1>Ôn ngẫu nhiên Số câu hỏi : {{ count($QuestionRandom) }} <a href="friend-question/friend=8F{{$info_friend['id_user'] }}41T{{ $idmatrixfriend  }}">Làm lại</a></h1>
        <div class="quiz-container">
          <div  id="quiz"></div>
        </div>
        
    </table>
  </div>
  
  <div id='result'>
  </div>
  <button id="previous">Trở về</button>
  <button id="next">Tiếp theo</button>
  <button id="submit">Chấp điểm</button>
  <div id="results"></div>  

</div>
</div>

<!-- /.container-fluid -->
@endsection

@section('script')
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/watch.js"></script>


<script type="text/javascript">
  (function() {

    const myQuestions = [
    @foreach($QuestionRandom as $rowQRanDom) 
    {

      question: "{{ $rowQRanDom->content_question }}",
      answers: {
        1: "{{ $rowQRanDom->question_a }}",
        2: "{{ $rowQRanDom->question_b }}",
        3: "{{ $rowQRanDom->question_c }}",
        4: "{{ $rowQRanDom->question_d }}"
      },
      correctAnswer: "{{ $rowQRanDom->answer }}"
    },
    @endforeach

    ];

    function buildQuiz() {
    // we'll need a place to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // we'll want to store the list of answer choices
      const answers = [];

      // and for each available answer...
      for (letter in currentQuestion.answers) {
        // ...add an HTML radio button
        answers.push(
          `<label>
          <input type="radio" name="question${questionNumber}" value="${letter}">
          ${letter} :
          ${currentQuestion.answers[letter]}
          </label>`
          );
    }
      // add this question and its answers to the output
      output.push(
        `<div class="slide">
        <div  class="question"> <h5>${currentQuestion.question}</h5> </div>
        <div class="answers"> ${answers.join("")} </div>
        </div>`
        );
  });

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join("");
}

function showResults() {
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll(".answers");

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if (userAnswer === currentQuestion.correctAnswer) {
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = "lightgreen";
    } else {
        // if answer is wrong or blank
        // color the answers red
        answerContainers[questionNumber].style.color = "red";
    }
});

    // show number of correct answers out of total
    resultsContainer.innerHTML = `Đúng ${numCorrect}  trên ${myQuestions.length}`;
}

function showSlide(n) {
  slides[currentSlide].classList.remove("active-slide");
  slides[n].classList.add("active-slide");
  currentSlide = n;

  if (currentSlide === 0) {
    previousButton.style.display = "none";
  } else {
    previousButton.style.display = "inline-block";
  }

  if (currentSlide === slides.length - 1) {
    nextButton.style.display = "none";
  } else {
    nextButton.style.display = "inline-block";
  }
}

function showNextSlide() {
  showSlide(currentSlide + 1);
}

function showPreviousSlide() {
  showSlide(currentSlide - 1);
}

const quizContainer = document.getElementById("quiz");
const resultsContainer = document.getElementById("results");
const submitButton = document.getElementById("submit");

  // display quiz right away
  buildQuiz();

  const previousButton = document.getElementById("previous");
  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  let currentSlide = 0;

  showSlide(0);

  // on submit, show results
  submitButton.addEventListener("click", showResults);
  previousButton.addEventListener("click", showPreviousSlide);
  nextButton.addEventListener("click", showNextSlide);
})();

</script>
@endsection





















