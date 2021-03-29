document.addEventListener("DOMContentLoaded", function (event) {

 let symbolPrice = document.querySelector('.symbol_price input')?.value
 let totalPrice = document.querySelector('.total_price input')

 let textArea = document.querySelector('.textArea_count textarea')
 let title = document.querySelector('.title_count input')

 let releaseCount = document.querySelector('.release_count input')?.value

 let selectedArticle = document.querySelector('.article_price select')
 selectedArticle?.addEventListener('change', () => {
  counter()
 })

 let selectedPhoto = document.querySelector('.photo_size select')
 selectedPhoto?.addEventListener('change', () => {
  counter()
 })



 textArea?.addEventListener('input', () => {
  if (textArea.value.length) {
   counter()
  }
 })

 title?.addEventListener('input', () => {
  if (title.value.length) {
   counter()
  }
 })



 function counter() {
  let selectedPrice = selectedPhoto?.options[selectedPhoto.selectedIndex].getAttribute('price')
  let articlePrice = selectedArticle?.options[selectedArticle.selectedIndex].getAttribute('price')

  let result = ((textArea?.value.length + title?.value.length) * symbolPrice) + +articlePrice + +selectedPrice
  if (result) {
   totalPrice.value = +result.toFixed(1) * +releaseCount
  }
 }

 counter()




});