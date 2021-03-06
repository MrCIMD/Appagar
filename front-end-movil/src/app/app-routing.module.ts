import { NgModule } from "@angular/core";
import { PreloadAllModules, RouterModule, Routes } from "@angular/router";
import { DashboardPage } from "./app/dashboard/dashboard.page";

const routes: Routes = [
  {
    path: "auth",
    loadChildren: () =>
      import("./app/auth/auth.module").then((m) => m.AuthPageModule),
  },
  {
    path: "dashboard",
    component: DashboardPage,
    loadChildren: () =>
      import("./app/dashboard/dashboard.module").then(
        (m) => m.DashboardPageModule,
      ),
  },
  { path: "**", pathMatch: "full", redirectTo: "auth" },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
  ],
  exports: [RouterModule],
})
export class AppRoutingModule {}
