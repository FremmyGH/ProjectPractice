using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using System.Data.SqlClient;
using System.Data;

namespace WcfServiceLibrary1
{
    // ПРИМЕЧАНИЕ. Команду "Переименовать" в меню "Рефакторинг" можно использовать для одновременного изменения имени класса "Service1" в коде и файле конфигурации.
    public class Service1 : IService1
    {
        DataSet ds;
        SqlDataAdapter adapter;
        SqlCommand command;
        SqlParameter parameter;
        string conn = @"Data Source=DESKTOP-FPQ69BF\SQLSERVER;Initial Catalog=ProjectPractice;Integrated Security=True";
       
        //всех записей
        public DataSet GetClient()
        {
            string proc = "GetClient";
            using(SqlConnection con=new SqlConnection(conn))
            {
                con.Open();
                adapter = new SqlDataAdapter(proc, con);
                ds = new DataSet();
                adapter.Fill(ds, "Client");
                con.Close();
            }
            return ds;
        }
        //добавление
        public string InsertClient(string fio)
        {
            string proc = "InsertClient";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                command = new SqlCommand(proc, con);
                command.CommandType = CommandType.StoredProcedure;
                parameter = new SqlParameter { ParameterName = "@name", Value = fio };
                command.Parameters.Add(parameter);
                var result = command.ExecuteScalar();
                con.Close();
                return "Id добавленного клиента: " + result;
            }
        }
        //удаление
        public string DeleteClient(int id)
        {
            string proc = "DeleteClient";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                command = new SqlCommand(proc, con);
                command.CommandType = CommandType.StoredProcedure;
                parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                command.ExecuteNonQuery();
                con.Close();
                return "Клиент удален";
            }
        }
        //обновление
        public string UpdateClient(int id, string fio)
        {
            string proc = "UpdateClient";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                command = new SqlCommand(proc, con);
                command.CommandType = CommandType.StoredProcedure;
                parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                SqlParameter paramete1 = new SqlParameter { ParameterName = "@name", Value = fio };
                command.Parameters.Add(paramete1);
                command.ExecuteNonQuery();
                con.Close();
                return "Клиент " + id + " обновлен";
            }
        }


        public DataSet GetRequest()
        {
            string proc = "GetRequest";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                adapter = new SqlDataAdapter(proc, con);
                ds = new DataSet();
                adapter.Fill(ds, "Request");
                con.Close();
            }
            return ds;
        }
        public string InsertRequest(int id)
        {
            string proc = "InsertRequest";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                command = new SqlCommand(proc, con);
                command.CommandType = CommandType.StoredProcedure;
                parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                var result = command.ExecuteScalar();
                con.Close();
                return "Id добавленной заявки: " + result;
            }
        }

        public string DeleteRequest(int id)
        {
            string proc = "DeleteRequest";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                command = new SqlCommand(proc, con);
                command.CommandType = CommandType.StoredProcedure;
                parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                command.ExecuteNonQuery();
                con.Close();
                return "Заявка удалена";
            }
        }

        public string UpdateRequest(int id, int client)
        {
            string proc = "UpdateRequest";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                command = new SqlCommand(proc, con);
                command.CommandType = CommandType.StoredProcedure;
                parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                SqlParameter paramete1 = new SqlParameter { ParameterName = "@client", Value = client };
                command.Parameters.Add(paramete1);
                command.ExecuteNonQuery();
                con.Close();
                return "Заявка " + id + " обновлена";
            }
        }


        public DataSet GetService()
        {
            string proc = "GetService";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                adapter = new SqlDataAdapter(proc, con);
                ds = new DataSet();
                adapter.Fill(ds, "Service");
                con.Close();
            }
            return ds;
        }
        public string InsertService(string name, int price)
        {
            string proc = "InsertService";
            using (SqlConnection con = new SqlConnection(conn))
            {

                con.Open();
                command = new SqlCommand(proc, con);
                command.CommandType = CommandType.StoredProcedure;
                parameter = new SqlParameter { ParameterName = "@name", Value = name };
                command.Parameters.Add(parameter);
                SqlParameter parameter1 = new SqlParameter { ParameterName = "@price", Value = price };
                command.Parameters.Add(parameter1);
                var result = command.ExecuteScalar();
                con.Close();
                return "Id добавленной услуги: " + result;
            }
        }

        public string DeleteService(int id)
        {
            string proc = "DeleteService";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                command = new SqlCommand(proc, con);
                command.CommandType = CommandType.StoredProcedure;
                parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                command.ExecuteNonQuery();
                con.Close();
                return "Услуга удалена";
            }
        }

        public string UpdateService(int id, string name, int price)
        {
            string proc = "UpdateService";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                command = new SqlCommand(proc, con);
                command.CommandType = CommandType.StoredProcedure;
                parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                SqlParameter parameter1 = new SqlParameter { ParameterName = "@price", Value = price };
                command.Parameters.Add(parameter1);
                SqlParameter parameter2 = new SqlParameter { ParameterName = "@name", Value = name };
                command.Parameters.Add(parameter2);
                command.ExecuteNonQuery();
                con.Close();
                return "Услуга " + id + " обновлена";
            }
        }


        public DataSet GetRequest_Service()
        {
            string proc = "GetRequest_Service";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                adapter = new SqlDataAdapter(proc, con);
                ds = new DataSet();
                adapter.Fill(ds, "Request_Service");
                con.Close();
            }
            return ds;
        }

    }
}
