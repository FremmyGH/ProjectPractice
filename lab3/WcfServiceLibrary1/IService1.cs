using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using System.Data;

namespace WcfServiceLibrary1
{
    // ПРИМЕЧАНИЕ. Команду "Переименовать" в меню "Рефакторинг" можно использовать для одновременного изменения имени интерфейса "IService1" в коде и файле конфигурации.
    [ServiceContract]
    public interface IService1
    {
        [OperationContract]
        DataSet GetClient();      

        [OperationContract]
        string InsertClient(string fio);

        [OperationContract]
        string DeleteClient(int id);

        [OperationContract]
        string UpdateClient(int id, string fio);


        [OperationContract]
        DataSet GetRequest();
        
        [OperationContract]
        string InsertRequest(int id);

        [OperationContract]
        string DeleteRequest(int id);

        [OperationContract]
        string UpdateRequest(int idOr, int idCl);

        [OperationContract]
        DataSet GetService();

        [OperationContract]
        string InsertService(string name,  int price);

        [OperationContract]
        string DeleteService(int id);

        [OperationContract]
        string UpdateService(int id, string name, int price);


        [OperationContract]
        DataSet GetRequest_Service();

        // TODO: Добавьте здесь операции служб
    }

    // Используйте контракт данных, как показано на следующем примере, чтобы добавить сложные типы к сервисным операциям.
    // В проект можно добавлять XSD-файлы. После построения проекта вы можете напрямую использовать в нем определенные типы данных с пространством имен "WcfServiceLibrary1.ContractType".
   
}
