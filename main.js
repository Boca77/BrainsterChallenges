let count = 0;
let correctCount = 0;

$("section").hide();
$("#question-count").html(count);

$("#start-btn").click(() => {
  $("#intro").hide();
  $("#quiz").show(() => {
    $("#quiz").addClass("animate__animated", "animate__fadeInLeft");
  });
});

const fetchQuestions = () => {
  fetch("https://opentdb.com/api.php?amount=20&type=multiple")
    .then((response) => response.json())
    .then((data) => {
      $("#loading").hide();
      $("#intro").show("slow");

      localStorage.setItem("correctQuestions: ", correctCount);

      let id = 1;
      let hashID = 1;

      data.results.forEach((question) => {
        let correctAnswer = [question.correct_answer];
        let incorrectAnswers = question.incorrect_answers;
        let allAnswers = incorrectAnswers.concat(correctAnswer);
        let decodedCorrect = $("<textarea />").html(correctAnswer).text();

        elementCreate(id);

        $(`#que-${id}`).html(question.question);
        $(`#category-${id}`).html(question.category);
        allAnswers = allAnswers.sort(() => Math.random() - 0.5);

        allAnswers.forEach((answer) => {
          const btn = document.createElement("button");
          const answerDiv = document.getElementById(`answers-${id}`);

          btn.classList.add("answer", "btn", "btn-outline-secondary");
          btn.innerHTML = answer;
          answerDiv.appendChild(btn);

          btn.addEventListener("click", (e) => {
            hashID++;

            e.target.parentElement.parentElement.parentElement.classList.add(
              "d-none"
            );

            count++;

            if (hashID > 20) {
              window.location.hash = `#end`;

              $("#quiz").hide();
              $("#end").show(() => {
                $("#end").addClass(
                  "d-flex",
                  "animate__animated",
                  "animate__fadeInLeft"
                );
              });
              $("#correct-count").html(correctCount);
            }

            if (count < 20) {
              window.location.hash = `#question-${hashID}`;
              $("#question-count").html(count);
            }

            if (e.target.innerHTML === decodedCorrect) {
              correctCount++;
              localStorage.setItem("correctQuestions: ", correctCount);
            }
          });
        });
        id++;
      });
      window.addEventListener("hashchange", hashHandler);
    })
    .catch((error) => {
      console.error(error);
    });
};

$(document).ready(() => {
  fetchQuestions();
});

$("#start-over-btn").click(() => {
  window.location.reload();
  localStorage.removeItem("correctQuestions: ");
});

$("#try-again-btn").click(() => {
  window.location.reload();
  localStorage.removeItem("correctQuestions: ");
});

function hashHandler() {
  let id = location.hash;

  document.querySelectorAll(".card").forEach((card) => {
    card.classList.add("d-none");
    card.classList.remove("d-flex", "animate__animated", "animate__fadeInLeft");
  });

  if (id) {
    const element = document.querySelector(id);
    if (element) {
      element.classList.remove("d-none");
      element.classList.add(
        "d-flex",
        "animate__animated",
        "animate__fadeInLeft"
      );
    }
  }
}

function elementCreate(id) {
  const questions = document.getElementById("questions");
  const card = document.createElement("div");
  const questionDiv = document.createElement("div");
  const cardBody = document.createElement("div");
  const answerDiv = document.createElement("div");
  const categoryDiv = document.createElement("div");

  questions.appendChild(card);
  card.appendChild(questionDiv);
  card.appendChild(cardBody);
  cardBody.appendChild(answerDiv);
  card.appendChild(categoryDiv);

  card.classList.add("card", "d-none");
  card.setAttribute("id", `question-${id}`);
  questionDiv.classList.add("card-header", "fs-5");
  questionDiv.setAttribute("id", `que-${id}`);
  cardBody.classList.add("card-body");
  answerDiv.classList.add("d-flex", "justify-content-center", "gap-5", "p-3");
  answerDiv.setAttribute("id", `answers-${id}`);
  categoryDiv.classList.add("card-footer", "text-muted");
  categoryDiv.setAttribute("id", `category-${id}`);
}
