const title = document.getElementById("title");
const input = document.querySelectorAll("input");
const author = document.getElementById("author");
const page_on = document.getElementById("page_on");
const max_pages = document.getElementById("max_pages");
const books = document.getElementById("books");
const book_stat = document.getElementById("book_stat");
const submit = document.getElementById("submit");
const error_msg = document.getElementById("error_msg");
const table = document.getElementById("table");

let bookArray = [];

class Book {
  constructor(title, author, page_on, max_pages) {
    this.title = title;
    this.author = author;
    this.page_on = page_on;
    this.max_pages = max_pages;
  }
}

bookArray.push(
  new Book("The Hobbit", "J.R.R Tolkien", 60, 200),
  new Book("Harry Potter", "J.K Rowling", 150, 250),
  new Book("50 Shades of Gray", "E.L James", 150, 150),
  new Book("Don Quixote", "Miguel de Cervantes", 300, 350),
  new Book("Hamlet", "William Shakespeare", 550, 550)
);

addToList();
addToTable();

submit.addEventListener("click", (e) => {
  e.preventDefault();
  let error = false;
  input.forEach((input) => {
    if (!input.value) {
      errorMsg(
        '<span class="alert alert-danger" role="alert"> Please fill all the inputs </span>'
      );

      error = true;
      return false;
    }
  });

  if (error) {
    return false;
  }

  if (isNaN(page_on.value) || isNaN(max_pages.value)) {
    errorMsg(
      '<span class="alert alert-danger" role="alert"> Current page on and Max pages inputs must be numbers </span>'
    );

    resetPagesInputs();
    return false;
  }
  if (Number(page_on.value.trim()) > Number(max_pages.value.trim())) {
    errorMsg(
      '<span class="alert alert-danger" role="alert"> Current page on input cant be a bigger number than Max pages input </span>'
    );

    resetPagesInputs();
    return false;
  }
  bookArray.push(
    new Book(title.value, author.value, page_on.value, max_pages.value)
  );

  addToList();
  addToTable();
  reset();

  errorMsg(`<div class="alert alert-success alert-dismissible fade show" role="alert">
     Successfully added to list
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>`);
});

function reset() {
  error = false;
  error_msg.innerHTML = "";
  page_on.value = "";
  max_pages.value = "";
  title.value = "";
  author.value = "";
}

function addToList() {
  books.innerHTML = "";
  book_stat.innerHTML = "";

  bookArray.forEach((book) => {
    let color = "red";
    let status = "you still need to ";

    books.innerHTML += `<li> ${book.title} by ${book.author} </li>`;

    if (book.page_on == book.max_pages) {
      status = "already have ";
      color = "green";
    }

    book_stat.innerHTML += `<li style="color: ${color}"> You ${status} read ${book.title} by ${book.author} </li>`;
  });
}

function addToTable() {
  table.innerHTML = "";

  bookArray.forEach((book) => {
    let progress = (book.page_on / book.max_pages) * 100;

    table.innerHTML += `<td>${book.title}</td>
    <td>${book.author}</td>
    <td>${book.max_pages}</td>
    <td>${book.page_on}</td>
    <td style="padding: 0">
      <div class="bar">
        <div class="progress" style="width: ${progress}%;">
         ${Math.trunc(progress)}%
        </div>
      </div>
    </td>`;
  });
}

function resetPagesInputs() {
  page_on.value = "";
  max_pages.value = "";
}

function errorMsg(message) {
  error_msg.innerHTML = message;
}
