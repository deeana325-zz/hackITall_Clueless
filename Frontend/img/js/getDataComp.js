const apiUrl = 'http://clueless-back.eba-rvg63msp.eu-west-1.elasticbeanstalk.com/api/stocks';

async function fetchPosts(comp) {
    try {
        
        console.log(comp);
        const response = await fetch(`${apiUrl}/` + comp, {
        method: 'GET'
    }); // wait for site to send response // async func and await returns a promise  // daca mere bine in jur de 200
       
    if(!response.ok) {
        throw new Error(`Failed to fetch posts: ${response.status}`)
    }

    return await response.json();
    } catch(e) {
        console.log(e);
    }
}

async function listsPosts(comp, postContainerElementId) {
    const postContainerElement = document.getElementById(postContainerElementId);

    if(!postContainerElementId) {
        return;
    }

    //const posts = await fetchPosts(); 
    fetchPosts(comp).then(post => {  // listst of posts
        if(!post) {
            postContainerElement.innerHTML = 'No posts fetched.';
            return;
        }

        postContainerElement.appendChild(postElement(post));

    }).catch(e => {
        console.log(e);
    });
}

function postElement(post) { // creeaza elemente

    const anchorElement = document.createElement('a'); // anchor e pt linkuri
    anchorElement.setAttribute('href', `${apiUrl}/posts/${post.id}`);
    anchorElement.setAttribute('target', '_blank'); // open link in new tab
    anchorElement.innerText = capitalizeFirstLetter(post.name);

    localStorage.setItem("name", post.name);
    localStorage.setItem("description", post.description);
                        // key + value
    
    dataArray =  post.stats;

    console.log(description);
    console.log(dataArray);

    console.log(dataArray[0].date);
    console.log( dataArray[0].price.substring(0, dataArray[0].price.length - 1));

    localStorage.setItem("date1", dataArray[0].date);
    localStorage.setItem("date2", dataArray[1].date);
    localStorage.setItem("date3", dataArray[2].date);
    localStorage.setItem("date4", dataArray[3].date);

    localStorage.setItem("price1", dataArray[0].price.substring(0, dataArray[0].price.length - 1));
    localStorage.setItem("price2", dataArray[1].price.substring(0, dataArray[1].price.length - 1));
    localStorage.setItem("price3", dataArray[2].price.substring(0, dataArray[2].price.length - 1));
    localStorage.setItem("price4", dataArray[3].price.substring(0, dataArray[3].price.length - 1));


    const postTitleElement = document.createElement('h3');
    postTitleElement.appendChild(anchorElement); // insert the anchorElement into the postTitleElement

    /* 
        <h3>
            <a href>
        </h3>    
    */ 
    return false;
}

function capitalizeFirstLetter(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

