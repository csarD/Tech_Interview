'use client'
import Image from "next/image";
import styles from "./page.module.css";
import axios from "axios"
import {handleAction} from "next/dist/server/app-render/action-handler";
import MUIDataTable from "mui-datatables";
import {useEffect, useState} from "react";
import Navbar from "@/shared/components/Navbar";
import {uris} from "@/shared/ApiCalls";
export default function Home() {
  const [datos,setDatos] = useState([]);
  const [status,setStatus]=useState(false)
  //var intervalID = setInterval(status, 120000);





  async function handleAction() {
    setDatos([])
    setStatus(!status)
    if(!status){
      let data=await axios.get(uris.Market)
      setDatos(data.data)
    }else{
      let data=await axios.get(uris.Bodega)
      setDatos(data.data)
    }


  }

  const columns = ["id","name", "units"];
  const columns2 = ["id","name", "units","created_at"];
  async function getData(){
    let data=await axios.get(uris.Bodega)
   setDatos(data.data)
  }
  useEffect( ()=>{
   getData()
  },[])


  const options = {
    filterType: 'checkbox',
  };
  return (
    <main className={styles.main}>
      <div className={styles.description}>
        {!status &&
            <button onClick={handleAction} style={{
              backgroundColor: '#a1cf9a',
              color: "#000",
              padding: "7px",
              borderRadius: "5px"
            }}>Pedidos <br/> Mercado
            </button>
        }
        {status &&
            <button onClick={handleAction} style={{
              backgroundColor: '#a1cf9a',
              color: "#000",
              padding: "7px",
              borderRadius: "5px"
            }}>Ingredientes <br/> Disponibles
            </button>
        }

        <div>
          <a
              href="https://vercel.com?utm_source=create-next-app&utm_medium=appdir-template&utm_campaign=create-next-app"
              target="_blank"
              rel="noopener noreferrer"
          >
            By{" "}
            <Image
                src="/vercel.svg"
                alt="Vercel Logo"
                className={styles.vercelLogo}
                width={100}
                height={24}
                priority
            />
          </a>
        </div>
      </div>
      {datos.length > 0 && <MUIDataTable
          title={!status ? "Ingredients Disponibles" : "Pedidos Realizados"}
          data={datos}
          columns={!status?columns:columns2}

      />}
      {datos.length==0 && <MUIDataTable
          title={!status ? "Ingredients Disponibles" : "Pedidos Realizados"}
          data={[]}
          columns={!status?columns:columns2}

      />}


      <Navbar/>
    </main>
  );
}
