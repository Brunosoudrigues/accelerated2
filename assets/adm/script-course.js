console.log("oi");

const selectCategory = document.querySelector("#category");

selectCategory.addEventListener("change",  async () => {
    console.log("oi do evento");
    const url = "http://localhost/accelerated/api/products/category/1";
    const response = await fetch(url, {
        method : "get"
    });
    console.log(response);
});