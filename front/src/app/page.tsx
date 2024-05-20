'use client'
import Image from "next/image";
import styles from "./page.module.css";
import axios from "axios"
import {handleAction} from "next/dist/server/app-render/action-handler";
import MUIDataTable from "mui-datatables";
import {useEffect, useState} from "react";
export default function Home() {
  const [datos,setDatos] = useState([]);
  //var intervalID = setInterval(status, 120000);

  async function status() {
    let data=await axios.post('http://192.168.0.101:80/api/validateStatus')
    setDatos(data.data)
  }



  async function handleAction() {

    let data=await axios.post('http://192.168.0.101:80/api/newOrder')
    setDatos(data.data)
    status()
  }

  const columns = ["id","name", "duration", "created_at", "Status"];
  async function getData(){
    let data=await axios.get('http://192.168.0.101:80/api/ActiveOrders')
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
        <button onClick={handleAction}>Nueva Orden</button>
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


      <div className={styles.grid}>
        <a
          href="https://nextjs.org/docs?utm_source=create-next-app&utm_medium=appdir-template&utm_campaign=create-next-app"
          className={styles.card}
          target="_blank"
          rel="noopener noreferrer"
        >
          <h2>
            Docs <span>-&gt;</span>
          </h2>
          <p>Find in-depth information about Next.js features and API.</p>
        </a>

        <a
          href="https://nextjs.org/learn?utm_source=create-next-app&utm_medium=appdir-template&utm_campaign=create-next-app"
          className={styles.card}
          target="_blank"
          rel="noopener noreferrer"
        >
          <h2>
            Learn <span>-&gt;</span>
          </h2>
          <p>Learn about Next.js in an interactive course with&nbsp;quizzes!</p>
        </a>

        <a
          href="https://vercel.com/templates?framework=next.js&utm_source=create-next-app&utm_medium=appdir-template&utm_campaign=create-next-app"
          className={styles.card}
          target="_blank"
          rel="noopener noreferrer"
        >
          <h2>
            Templates <span>-&gt;</span>
          </h2>
          <p>Explore starter templates for Next.js.</p>
        </a>

        <a
          href="https://vercel.com/new?utm_source=create-next-app&utm_medium=appdir-template&utm_campaign=create-next-app"
          className={styles.card}
          target="_blank"
          rel="noopener noreferrer"
        >
          <h2>
            Deploy <span>-&gt;</span>
          </h2>
          <p>
            Instantly deploy your Next.js site to a shareable URL with Vercel.
          </p>
        </a>
      </div>
    </main>
  );
}
