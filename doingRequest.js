/* const url = 'http://localhost/projetox/webservice/rest.php?class=pessoaServices&method=getData&id=1';
const Http = new XMLHttpRequest();
Http.open("GET", url);
Http.send();

Http.onreadystatechange = (e) => {
   console.log(Http.responseText)
} */
 
/* const Http = new XMLHttpRequest();
const url='https://jsonplaceholder.typicode.com/posts';
Http.open("GET", url);
Http.send();

Http.onreadystatechange = function(){
  if (this.readyState == 4 && this.status == 200){
    console.log(Http.responseText);
  }
  
} */

/*
const Url='https://jsonplaceholder.typicode.com/posts'; 
const Data = {
    name:'Said',
    id:23
};

 
 const otheParam ={
    headers:{
        "content-type":"application/json; charset=UTF-8"
    },
    body:Data, 
    method:"POST"
}
fetch(Url,otheParam)
  .then(data =>data.json())
  .then(res =>{console.log(res)})
  .then(error =>{console.log(error)})
 */

  console.log('...Taking http request with fetch api...');
  const Url='https://jsonplaceholder.typicode.com/posts';
  fetch(Url)
    .then(data=>{return data.json()})
    .then(res=>{console.log(`retorno ${res}`)})