"use strict";

const getData = async () => {
    const latestBooks = document.querySelector("#latest-books");
    const res = await fetch("/api/books/latest");
    const data = await res.json();
    console.log(data);
    data.forEach((book, i) => {
        latestBooks.insertAdjacentHTML(
            "afterbegin",
            `
    <div class="book-container">
      <h3>${book.title}</h2>
      <div class="content-container">
        <img src="${book.image}" alt="cover of a book" />
        <div class="description">${book.description}</div>
      </div>
    </div>
    `
        );
    });
};

getData();
