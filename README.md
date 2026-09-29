# 🍸 Distilleria AfterBit - E-Commerce & Catalogo Prodotti

Piattaforma E-Commerce e catalogo digitale sviluppata per **Distilleria / Liquorificio Artigianale**, basata su **WordPress** e **WooCommerce**.

🌐 **Demo Live:** [https://test100.afterbit.it](https://test100.afterbit.it)

---

## 📋 Caratteristiche del Progetto

* **Tema:** *Astra* + Child Theme personalizzato `distilleria-child`.
* **Catalogo Prodotti:** 10+ distillati e liquori artigianali tipici della tradizione italiana (Amari alpini, Grappa barricata, Gin botanico, Limoncello di Sorrento IGP, Mirto sardo, Nocino riserva, Vermouth superiore).
* **Gestione Ordini e Clienti:** Anagrafiche clienti B2B ed enoteche, calcolo imposte, gestione stock e ordini demo con stati differenziati.
* **Pagine Istituzionali:**
  * **Home Page:** Hero banner, punti di forza (ingredienti 100% naturali, alambicco in rame, packaging protettivo), vetrina bestseller, sala degustazioni.
  * **Chi Siamo (`/chi-siamo/`):** Filosofia aziendale, selezione delle materie prime e metodo di distillazione.
  * **Degustazioni & Contatti (`/contatti/`):** Informazioni sulla distilleria, orari di visita e modulo di prenotazione degustazioni guidate.

---

## 🗂️ Struttura della Repository

```
distilleria/
├── .github/
│   └── workflows/
│       └── deploy.yml          # Workflow CI/CD per deploy automatico
├── wp-content/
│   └── themes/
│       └── distilleria-child/  # Child theme personalizzato
│           ├── functions.php   # Hook, filtri e personalizzazioni WooCommerce
│           └── style.css       # Stili dedicati alla distilleria
├── .gitignore                  # File ignorati (core, uploads, credenziali)
└── README.md                   # Documentazione di progetto
```

---

## 🚀 Requisiti & Setup Locale

* **PHP:** >= 8.0
* **MySQL:** >= 5.7 o MariaDB >= 10.4
* **WordPress:** >= 6.5
* **WooCommerce:** >= 8.5
