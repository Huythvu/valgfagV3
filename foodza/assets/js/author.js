const communityList = document.querySelector('.community-posts-list');

async function loadCommunityPosts() {
  const response = await fetch('/wp-json/wp/v2/communitypost?_embed');
  const communityPosts = await response.json();
  console.log(communityPosts);

  communityPosts.forEach(communityPost => {
    const authorName = communityPost._embedded.author[0].name;

    // interpolate into a template string
    communityList.innerHTML += `<h2>${authorName}</h2>`;
  });
}

loadCommunityPosts();
