/* global wpData */
import React, { useEffect, useState } from 'react';
import Posts from './components/Posts';
import './App.css';

function App() {

  // const [posts, setPosts] = useState([]);
  // const wpData = window.wpData || { restUrl: '', nonce: '' };
  console.log('6');
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
        <Posts />
    </div>
  );
}

export default App;
