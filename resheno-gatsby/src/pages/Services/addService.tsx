import * as React from "react"
import { useMutation, gql } from '@apollo/client';

const AddService = () => {
  const [addService, { data, loading, error }] = useMutation(queryPosts)

  if (error) console.error(error);

  if (loading) return <div>Загрузка...</div>;

  function sendService() {
    addService({ variables: { subTitle: `New from front ${+new Date}` } });
  }

  return (
    <div className="Index">
      <button onClick={sendService}>Добавить новую услугу</button>
    </div>
  )
}

const queryPosts = gql`
mutation AddService($subTitle: String!) {
  service(subTitle: $subTitle) {
    id
    subTitle
  }
}
`;

export default AddService
