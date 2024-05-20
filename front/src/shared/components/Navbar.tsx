import styles from "@/app/page.module.css";

export default function navbar() {
    return <div className={styles.grid}>
        {window.location.pathname!=="/" &&
        <a
            href="/"
            className={styles.card}

            rel="noopener noreferrer"
        >
            <h2>
                Ordenes Activas<span>-&gt;</span>
            </h2>

        </a>
        }
        {window.location.pathname!=="/Historico" &&
        <a
            href="/Historico"
            className={styles.card}

            rel="noopener noreferrer"
        >
            <h2>
                Ordenes <span>-&gt;</span>
            </h2>

        </a>
        }
        {window.location.pathname!=="/Bodega" &&
            <a
                href="/Bodega"
                className={styles.card}

                rel="noopener noreferrer"
            >
                <h2>
                    Bodega <span>-&gt;</span>
                </h2>

            </a>
        }  {window.location.pathname!=="/Recetas" &&
        <a
            href="/Recetas"
            className={styles.card}

            rel="noopener noreferrer"
        >
            <h2>
                Recetas <span>-&gt;</span>
            </h2>

        </a>
    }{window.location.pathname!=="/Resumen" &&
        <a
            href="/Resumen"
            className={styles.card}

            rel="noopener noreferrer"
        >
            <h2>
                Resumen <span>-&gt;</span>
            </h2>

        </a>
    }

    </div>
}