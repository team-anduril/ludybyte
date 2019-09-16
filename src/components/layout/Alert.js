import React from "react";

export default function Alert({ alert }) {
  return (
    alert !== null && (
      <div className="alert alert-danger text-center error-alert">
         {alert}
      </div>
    )
  );
}

