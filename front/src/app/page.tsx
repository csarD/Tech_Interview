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
  //var intervalID = setInterval(status, 120000);

  async function status() {
    let data=await axios.post(uris.updateStatus)
    setDatos(data.data)
  }



  async function handleAction() {

    let data=await axios.post(uris.NuevaOrden)
    setDatos(data.data)
    status()
  }

  const columns = ["id","name", "duration", "created_at", "Status"];
  async function getData(){
    let data=await axios.get(uris.ActiveOrders)
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
        <button onClick={handleAction} style={{
          backgroundColor: '#a1cf9a',
          color: "#000",
          padding: "7px",
          borderRadius: "5px"
        }}>Nueva Orden</button>
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
      {datos.length>0 && <MUIDataTable
          title={"Ordenes Actuales"}
          data={datos}
          columns={columns}

      />}
      {datos.length==0 && <MUIDataTable
          title={"Ordenes Actuales"}
          data={[]}
          columns={columns}

      />}


      <Navbar/>
    </main>
  );
}
