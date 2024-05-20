'use client'
import Image from "next/image";
import styles from "./page.module.css";
import axios from "axios"
import {handleAction} from "next/dist/server/app-render/action-handler";
import MUIDataTable from "mui-datatables";
import {useEffect, useState} from "react";
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js';
import { Line } from 'react-chartjs-2';
import {
  Chart as ChartJS2,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,

} from 'chart.js';
import { Pie } from 'react-chartjs-2';
import {
  Chart as ChartJS3,

  BarElement,

} from 'chart.js';
import { Bar } from 'react-chartjs-2';
import Navbar from "@/shared/components/Navbar";
import {func} from "prop-types";
import {uris} from "@/shared/ApiCalls";
ChartJS.register(ArcElement, Tooltip, Legend);

ChartJS2.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
);

ChartJS3.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend
);
export default function Home() {
  const [datos,setDatos] = useState([]);
  const [graph1,setgraph1]=useState({labels:[],datasets:[]})
  const [graph2,setgraph2]=useState({labels:[],datasets:[]})
  const [graph3,setgraph3]=useState({labels:[],datasets:[]})
  const [graph4,setgraph4]=useState({labels:[],datasets:[]})
  const columns = ["Receta","name", "quantity"];
  async function getData(){
    let data=await axios.get(uris.Stats)

    DatosGraph1(data.data.Recetas)
    DatosGraph2(data.data.Recetas)
    DatosGraph3(data.data.Ingredientes)
    DatosGraph4(data.data.Problemas)
  }
  function DatosGraph1(datos){
    let labels=datos.map(dato => dato.name)
    let dataset=
    {
      label: 'Platos Preparados',
          data: datos.map(dato => dato.Total),
        backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(255, 206, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(255, 159, 64, 0.2)',
    ],
        borderColor: [
      'rgba(255, 99, 132, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(153, 102, 255, 1)',
      'rgba(255, 159, 64, 1)',
    ],
        borderWidth: 1,
    }
    setgraph1({
      labels:labels,datasets:[dataset]
    })
  }
  function DatosGraph2(datos){
    let labels=datos.map(dato => dato.name)
    let dataset=
        {
          label: 'Tiempo',
          data: datos.map(dato => dato.TimeInverted),
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
          ],
          borderWidth: 1,
        }
    setgraph2({
      labels:labels,datasets:[dataset]
    })
  }
  function DatosGraph3(datos){
    let labels=datos.map(dato => dato.name)
    let dataset=
        {
          label: 'Cantidades',
          data: datos.map(dato => dato.total),
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
          ],
          borderWidth: 1,
        }
    setgraph3({
      labels:labels,datasets:[dataset]
    })
  }
  function DatosGraph4(datos){
    let labels=datos.map(dato => dato.Problem)
    let dataset=
        {
          label: 'Cantidades',
          data: datos.map(dato => dato.total),
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
          ],
          borderWidth: 1,
        }
    setgraph4({
      labels:labels,datasets:[dataset]
    })
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


        <Navbar/>

        <div style={{height: "50vh", display: "flex", justifyContent: "center"}}>
          <div style={{display: "flex", flexDirection: "column"}}>
            <h2>Platos mas preparados</h2>
            {graph1.labels.length > 0 &&
                <Pie data={graph1}/>}
          </div>
          <div style={{display: "flex", flexDirection: "column"}}>
            <h2>Tiempo Invertido (minutos)</h2>
            {graph2.labels.length > 0 &&
                <Pie data={graph2}/>}
          </div>

        </div>
        <div style={{height: "50vh", display: "flex", justifyContent: "center",alignContent:"space-around"}}>
          <div style={{display: "flex", flexDirection: "column"}}>
            <h2>Ingredientes mas <br/>comprados</h2>
            {graph3.labels.length > 0 &&
                <Bar data={graph3}/>}
          </div>
          <div style={{display: "flex", flexDirection: "column"}}>
            <h2>Mercado sin productos</h2>
            {graph4.labels.length > 0 &&
                <Pie data={graph4}/>}
          </div>

        </div>


      </main>
  );
}
