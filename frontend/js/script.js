  
  
  const api = "https://advanced-movie-search.p.rapidapi.com/search/movie?query=kong&page=1";

    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '12409c201fmshe8c0a369d2aa4afp13b3d5jsnd4953e7580d8',
            'X-RapidAPI-Host': 'advanced-movie-search.p.rapidapi.com'
        }
    };

    async function getData(){
        
        try {
            const response = await fetch('https://advanced-movie-search.p.rapidapi.com/search/movie?query=kong&page=1', options)
            const data = await response.json();
            const v = Object.entries(data).map(m => m)
            console.log(v)
            // printData(data)
            
        } catch (error) {
            console.log("Error:",error.message)
            
        }
    
    }
    function printData(data){
        // console.log(data)
        const header = document.querySelector('#header')
        const content = document.querySelector('#content')

        header.innerHTML += `<select class="form-control" onchange="getCh(this.value)">
                    <option>please choose an option</option>
                    ${data.results.map(character => `<option  >${character.original_title}</option>`) }
                        </select>`
                        console.log(data)

    }


    async function getCh(name){
    if(name !="please choose an option"){
        const response = await fetch(`https://advanced-movie-search.p.rapidapi.com/search/movie?query=${name}&page=1`,options)
        const data = await response.json()
        console.log(data.results[0].title)
        content.innerHTML = `<h2>${data.results[0].title}</h2><br> <img src="${data.results[0].poster_path}" width="100">  <br><p>${data.results[0].overview}</p> `
    }
    }

    getData()