const communityList = document.querySelector('.community-posts-list');

async function loadCommunityPosts() {
  const response = await fetch('/wp-json/wp/v2/communitypost?_embed');
  const communityPosts = await response.json();


  communityPosts.forEach(communityPost => {
    const authorName = communityPost._embedded.author[0].name;
    const title = communityPost.title.rendered;

    // interpolate into a template string
    list.innerHTML += `<li>${title} — by ${authorName}</li>`;
  });
}

loadCommunityPosts();
