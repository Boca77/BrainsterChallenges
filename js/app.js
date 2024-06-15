let budgetInput = $("#budget-input");
let budgetSubmit = $("#budget-submit");
let budgetAmount = $("#budget-amount");
let balanceAmount = $("#balance-amount");
let errorMsgBudget = $("#error-msg-budget");
let tableDiv = $("#table");
let expenseInput = $("#expense-input");
let expenseAmount = $("#amount-input");
let expenseSubmit = $("#expense-submit");
let errorMsgExpenses = $("#error-msg-expenses");
let expenseInputs = $(".expense-input");
let expenses = $("#expense-amount");
let isFirstTime = true;
let id = 0;

let expensesValue = 0;
let balanceValue = 0;

budgetSubmit.click((e) => {
  e.preventDefault();

  if (!budgetInput.val() || budgetInput.val() < 0) {
    budgetInput.blur();
    errorMsgBudget.html("Value cannot be empty or negative");

    return;
  }

  let budgetVal = Number(budgetInput.val());
  budgetAmount.html(budgetVal);

  balanceValue = budgetVal - expensesValue;
  balanceAmount.html(balanceValue);

  balanceColor();

  budgetInput.val("");
  errorMsgBudget.html("");
});

expenseSubmit.click((e) => {
  e.preventDefault();

  if (!expenseAmount.val() || !expenseInput.val()) {
    errorMsgExpenses.html("Both inputs must be filled");

    return;
  }

  let expenseVal = Number(expenseAmount.val());

  if (isFirstTime) {
    let table = $(`<table class="w-75">
                <thead>
                  <tr class="list-item info-title">
                    <th>Expenses Title</th>
                    <th>Amount</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="table-body"></tbody>
              </table>`);
    tableDiv.append(table);
    isFirstTime = false;
  }

  addExpenseRow(expenseInput.val(), expenseVal);

  expensesValue += expenseVal;
  expenses.html(expensesValue);

  balanceValue = Number(budgetAmount.html()) - expensesValue;
  balanceAmount.html(balanceValue);

  balanceColor();

  expenseAmount.val("");
  expenseInput.val("");
  errorMsgExpenses.html("");
});

budgetInput.on("focus", () => {
  errorMsgBudget.html("");
});

expenseInputs.each(function () {
  $(this).on("focus", () => {
    errorMsgExpenses.html("");
  });
});

function balanceColor() {
  if (balanceValue > 0) {
    $("#balance").addClass("showGreen");
    $("#balance").removeClass("showRed");
  } else if (balanceValue == 0) {
    $("#balance").removeClass("showGreen");
    $("#balance").removeClass("showRed");
    $("#balance").removeClass("showBlack");
  } else {
    $("#balance").addClass("showRed");
    $("#balance").removeClass("showGreen");
  }
}

function addExpenseRow(expenseTitle, expenseVal) {
  let tableBody = $("#table-body");
  let tableRow = $(`
    <tr class="showRed list-item expense-item">
      <td class="expense-title">-${expenseTitle}</td>
      <td class="expense-amount">${expenseVal}</td>
      <td class="d-flex">
        <i class="fa-solid fa-pen-to-square edit-icon list-item"></i>
        <i class="fa-solid fa-trash delete-icon list-item"></i>
      </td>
    </tr>
  `);

  tableRow.find(".delete-icon").click(function () {
    let row = $(this).closest("tr");
    let amount = Number(row.find(".expense-amount").text());
    expensesValue -= amount;
    expenses.html(expensesValue);

    balanceValue = Number(budgetAmount.html()) - expensesValue;
    balanceAmount.html(balanceValue);

    balanceColor();
    row.remove();
  });

  tableRow.find(".edit-icon").click(function () {
    let row = $(this).closest("tr");
    let title = row.find(".expense-title").text();
    let amount = Number(row.find(".expense-amount").text());

    expenseInput.val(title);
    expenseAmount.val(amount);

    expensesValue -= amount;
    expenses.html(expensesValue);

    balanceValue = Number(budgetAmount.html()) - expensesValue;
    balanceAmount.html(balanceValue);

    balanceColor();
    row.remove();
  });

  tableBody.append(tableRow);
}
