import React, { useEffect, useState } from 'react';
import { GraphQLClient, gql } from 'graphql-request';

export default function Posts() {

	// States.
	const [posts, setPosts] = useState([]);
	const [loading, setLoading] = useState(true);
	const [error, setError] = useState(null);

  	useEffect(() => {
		const fetchPosts = async () => {
			const graphqlURL = 'https://followthislight.com/graphql';
			const query = gql`
			query Posts {
				posts(first: 10) {
				edges {
					node {
					id
					title
					excerpt
					featuredImage {
						node {
						altText
						sourceUrl
						}
					}
					}
				}
				}
			}
			`;

			const client = new GraphQLClient(graphqlURL);

			try {
				const data = await client.request(query);
				setPosts(data.posts.edges);
				setLoading(false);
			} catch (err) {
				setError(err.message);
				setLoading(false);
		}
	};

	fetchPosts();
  }, []);

  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error: {error}</p>;

  return (
	<div className="plugin2 bg-slate-300 py-8 px-4 md:p-8">
	  <h2 class="font-bold mb-5">Posts from This Light</h2>
	  <div className="flex flex-row flex-wrap justify-between">
		{posts.map(({ node: post }) => (
		  <div key={post.id} className="plugin2Box bg-white p-7 my-3 border rounded-md shadow-sm shadow-slate-500 basis-[100%] md:basis-[48%]">
			<h3 className="font-bold text-blue-900 mb-3">{post.title}</h3>
			{post.featuredImage && (
			  <img
				src={post.featuredImage.node.sourceUrl}
				alt={post.featuredImage.node.altText || 'Post Image'}
				style={{ maxWidth: '100px' }}
				className="w-full mb-5"
			  />
			)}
			<p className="text-lg" dangerouslySetInnerHTML={{ __html: post.excerpt }} />
		  </div>
		))}
	  </div>
	</div>
  );
}
