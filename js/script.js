  let chang = document.querySelectorAll(".edit");
  let delet = document.querySelectorAll(".delet");


function craet(x) {
  let creatd = document.createElement("div");
  creatd.classList.add("window")
  let creatf = document.createElement("div");
  creatf.classList.add("window-fixed")
  let creath2 = document.createElement("h2");
  let creath2t = document.createTextNode(`you are very ${x} ?`);
  creath2.appendChild(creath2t);
  creatf.appendChild(creath2)
  if (x === "chang") {
    let creata1 = document.createElement("a");
    let creata1t = document.createTextNode(`yes`);
    // creata1.setAttribute(`href`, `edit.php?id=$row[id]`)
    creata1.setAttribute(`href`, `edit.php?<php id=$row[id]?>`)
    creata1.appendChild(creata1t);
    creatf.appendChild(creata1);
  } else {
    let creata1 = document.createElement("a");
    let creata1t = document.createTextNode(`yes`);
    // creata1.setAttribute(`href`, `delete.php?id=$row[id]`)
    creata1.setAttribute(`href`, `delete.php<?=$id=$row[id]?>`)

    creata1.appendChild(creata1t);
    creatf.appendChild(creata1);
  }
  let creata2 = document.createElement("span");
  let creata2t = document.createTextNode(`no`);
  creata2.classList = "ccc";
  creatd.appendChild(creatf);
  creata2.appendChild(creata2t);
  creatf.appendChild(creata2);
  document.body.appendChild(creatd)
  creata2.onclick = () => {
    creatd.remove();
  }
}

chang.forEach((e) => {
e.addEventListener("click", (el) => {
  craet("chang");
})
});

delet.forEach((e) => {
  e.addEventListener("click", (el) => {
    craet("delete");
  })
});
//