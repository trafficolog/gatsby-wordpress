import * as React from "react"
import { useQuery, gql } from '@apollo/client';
import AddRecipe from './addRecipe';

type Post = {
  id: number;
  myGroup: {
    subTitle: string;
  };
}

type PageData = {
  recipes: {
    nodes: Array<Post>
  }
}

const RecipeIndex = () => {
  const { data, loading, error } = useQuery<PageData>(queryPosts);
  const [showAddRecipe, setShowAddRecipe] = React.useState(false);

  if (error) console.error(error);

  if (loading) return <div>Loading ...</div>;

  if (!data) return <div>No recipe</div>;

  function showRecipe() {
    setShowAddRecipe(true);
  }

  function hideRecipe() {
    setShowAddRecipe(false);
  }

  return (
    <div className="Index">
      <div>
          <button onClick={showRecipe}>Add Recipe</button>
      </div>
      {
        showAddRecipe && (
          <div>
            <div>
              <AddRecipe />
            </div>
            <button onClick={hideRecipe}>Close</button>
          </div>
        )
      }
      <ul>
      {
        data.recipes.nodes.map((recipe) => {
          return <li key={recipe.id}>{ recipe.myGroup.subTitle }</li>
        })
      }
      </ul>
    </div>
  )
}

const queryPosts = gql`
query getAllRecipes {
  recipes {
    nodes {
      id
      myGroup {
        subTitle
        fieldGroupName
      }
    }
  }
}
`;

export default RecipeIndex
