import * as React from "react"
import { useMutation, gql } from '@apollo/client';

const AddRecipe = () => {
  const [addRecipe, { data, loading, error }] = useMutation(queryPosts)

  if (error) console.error(error);

  if (loading) return <div>Loading ...</div>;

  function sendRecipe() {
    addRecipe({ variables: { subTitle: `New from front ${+new Date}` } });
  }

  return (
    <div className="Index">
      <button onClick={sendRecipe}>Send new recipe</button>
    </div>
  )
}

const queryPosts = gql`
mutation AddRecipe($subTitle: String!) {
  recipe(subTitle: $subTitle) {
    id
    subTitle
  }
}
`;

export default AddRecipe
