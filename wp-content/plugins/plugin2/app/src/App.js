/* global wpData */
import React, { useEffect, useState } from 'react';
import './App.css';

function App() {

  // const [posts, setPosts] = useState([]);
  // const wpData = window.wpData || { restUrl: '', nonce: '' };
  console.log('test');
  // useEffect(() => {
  //     fetch(wpData.restUrl + 'wp/v2/posts', {
  //         method: 'GET',
  //         headers: {
  //             'X-WP-Nonce': wpData.nonce,
  //         },
  //     })
  //         .then((response) => response.json())
  //         .then((data) => setPosts(data))
  //         .catch((error) => console.error(error));
  // }, []);


  return (
    <div>
        <h1>Posts from This Light</h1>
        <ul>
            {/* {posts.map((post) => (
                <li key={post.id}>{post.title.rendered}</li>
            ))} */}
        </ul>
    </div>
  );
}

export default App;
