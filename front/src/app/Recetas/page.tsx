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


  const columns = ["Receta","name", "quantity"];
  async function getData(){
    let data=await axios.get(uris.Recetas)
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
          title={"Recetas"}
          data={datos}
          columns={columns}

      />}
      {datos.length==0 && <MUIDataTable
          title={"Recetas"}
          data={[]}
          columns={columns}

      />}


      <Navbar/>
    </main>
  );
}
