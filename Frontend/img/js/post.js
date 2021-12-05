const apiUrl = 'http://clueless-back.eba-rvg63msp.eu-west-1.elasticbeanstalk.com/api/stocks';

async function fetchPosts() {
    try {
        const response = await fetch(`${apiUrl}`, {
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

async function listsPosts(postContainerElementId) {
    const postContainerElement = document.getElementById(postContainerElementId);

    if(!postContainerElementId) {
        return;
    }

    //const posts = await fetchPosts(); 
    fetchPosts().then(posts => {  // listst of posts
        if(!posts) {
            postContainerElement.innerHTML = 'No posts fetched.';
            return;
        }
        
        for(const post of posts) {
            postContainerElement.appendChild(postElement(post));
        }
    }).catch(e => {
        console.log(e);
    });
}

function postElement(post) { // creeaza elemente
    const opt = document.createElement('option'); // anchor e pt linkuri
    opt.value = post.name;
    opt.innerHTML = post.name + " " + post.dailyPercentGain;
    
    if( post.dailyPercentGain >= 0) {
        opt.classList.add("green");
    }else {
        opt.classList.add("red");
    }
    
    //     opt.classList.add("green bootstrap.option");
    // opt.setAttribute('href', `${apiUrl}/posts/${post.id}`);
    // opt.setAttribute('target', '_blank'); // open link in new tab
    // opt.innerText = capitalizeFirstLetter(post.title);

    // const postTitleElement = document.createElement('h3');
   //  postTitleElement.appendChild(anchorElement); // insert the anchorElement into the postTitleElement

    /* 
        <h3>
            <a href>
        </h3>    
    */

    return opt;
}

function capitalizeFirstLetter(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

