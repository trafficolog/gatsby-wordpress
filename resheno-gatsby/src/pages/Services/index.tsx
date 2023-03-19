import * as React from "react"
import { useQuery, gql } from '@apollo/client';
import AddService from './addService';

type Post = {
  id: number;
  myGroup: {
    subTitle: string;
  };
}

type PageData = {
  services: {
    nodes: Array<Post>
  }
}

const ServiceIndex = () => {
  const { data, loading, error } = useQuery<PageData>(queryPosts);
  const [showAddService, setShowAddService] = React.useState(false);

  if (error) console.error(error);

  if (loading) return <div>Загрузка...</div>;

  if (!data) return <div>Нет услуг</div>;

  function showService() {
    setShowAddService(true);
  }

  function hideService() {
    setShowAddService(false);
  }

  return (
    <div className="Index">
      <div>
          <button onClick={showService}>Добавить услугу</button>
      </div>
      {
        showAddService && (
          <div>
            <div>
              <AddService />
            </div>
            <button onClick={hideService}>Закрыть</button>
          </div>
        )
      }
      <ul>
      {
        data.services.nodes.map((service) => {
          return <li key={service.id}>{ service.myGroup.subTitle }</li>
        })
      }
      </ul>
    </div>
  )
}

const queryPosts = gql`
query getAllServices {
  services {
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

export default ServiceIndex
