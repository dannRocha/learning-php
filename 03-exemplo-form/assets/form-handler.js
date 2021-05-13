const HttpStatus = {
  '400': () => {
    let component = document.querySelector('[messagen-de-erro]')
    component.style.display = 'block'
    component.style.color = 'red'
    
  },
  '201': () => {
    let component = document.querySelector('[messagen-de-sucesso]')
    component.style.display = 'block'
    component.style.color = 'green'
  }
}


function parseJSONForFormURLEncoded(json) {
      
  let formBody = []
  
  for (let key in json) {
    let encodedKey = encodeURIComponent(key);
    let encodedValue = encodeURIComponent(json[key]);
    formBody.push(encodedKey + "=" + encodedValue)
  }
  
  return formBody.join("&");
}

/*
  Clear feedback message
*/
document.querySelectorAll('form input').forEach(e => {
  e.addEventListener('focus', ee => {
    document.querySelector('[messagen-de-erro]').style.display = 'none'
    document.querySelector('[messagen-de-sucesso]').style.display = 'none'
  })
})


/*
  Handler request event form
*/
document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault();

    document.querySelector('[messagen-de-erro]').style.display = 'none'
    document.querySelector('[messagen-de-sucesso]').style.display = 'none'
   
    let data = {
      name: document.querySelector('[name=name]').value, 
      email: document.querySelector('[name=email]').value
    }

    // useGET(data);
    usePOST(data);
    
  }, true)

async function useGET(data) {
  let response = await fetch(
    `/register.php?${parseJSONForFormURLEncoded(data)}`, 
    { method: "GET"}
  )

  HttpStatus[response.status] && HttpStatus[response.status]()
}

async function usePOST(data) {
  
  let response = await fetch('/register.php', 
    {
      method: "POST",
      body: parseJSONForFormURLEncoded(data),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }
  )

  HttpStatus[response.status] && HttpStatus[response.status]()
}