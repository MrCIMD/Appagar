import { Component, OnInit } from "@angular/core";

@Component({
  selector: "app-menu",
  templateUrl: "./menu.page.html",
  styleUrls: ["./menu.page.scss"],
})
export class MenuPage implements OnInit {
  public menu: any[] = [
    { rute: "/dashboard/egress", icon: "arrow-down-outline", name: "Egresos" },
    { rute: "/dashboard/entry", icon: "arrow-up-outline", name: "Ingresos" },
    { rute: "/dashboard/history", icon: "list-outline", name: "Historial" },
    { rute: "/dashboard/report", icon: "bar-chart-outline", name: "Reportes" },
    {
      rute: "/dashboard/service",
      icon: "notifications-outline",
      name: "Servicios",
    },
    { rute: "/dashboard/tool", icon: "hammer-outline", name: "Herramientas" },
  ];

  constructor() {}

  ngOnInit() {}
}
