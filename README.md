# Social Truck

**Social Truck** is a web system developed in **PHP**, considered the **precursor** of the project **CargaLink CDMX**.  
It was the very first version of the platform, sharing the same goal of connecting **clients** and **transport providers**, but built in a simpler and more experimental way.

---

## Main Features

- **User Roles**:
  - **Administrator**: manages the platform.
  - **Transport Representative**: manager of transport companies.
  - **Client Representative**: requests transport services.
  - **Carrier / Driver**: performs trips and confirms deliveries.

- **Document Management**:
  - Upload documents related to the trip (e.g., contracts).
  - Automatic generation of a **generic contract** once a trip is completed.

- **Trip Management**:
  - Register what needs to be transported (plain text input).
  - Carrier confirms arrival upon delivery.

- **Communication**:
  - Integrated chat system (limitation: all users can chat with everyone).

- **Payments**:
  - **Simulated** payment system (no real integration).

- **Interface**:
  - Mostly table-based views for data management (Not friendly).

---

## Known Limitations

- Chat does not restrict communication between roles (everyone can message everyone).  
- No cargo classification, only plain text description.  
- Payment system is purely simulated.  
- UI is basic compared to **CargaLink CDMX**.  

---

## Tech Stack

- **Language:** PHP  
- **Database:** MySQL  
- **Frontend:** HTML + CSS 

---

## Usage
- The project was mount in XAMPP server
- Using XAMPP server, you need to build-up the database (You can find the db script within the repo)

## Author’s Note

> This project is the **precursor of CargaLink CDMX** and represents the first attempt to digitize communication between clients and carriers.  
> Although limited, it laid the foundation for a much more robust and professional system.
