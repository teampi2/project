import * as React from 'react'

interface ClassesContextProps {
  classes: IClass[]
  currentClass: IClass | null
  setCurrentClass: React.Dispatch<React.SetStateAction<IClass | null>>
  openCreateDialog: boolean
  openUpdateDialog: boolean
  handleToggleCreateDialog: () => void
  handleToggleUpdateDialog: () => void
  handleCreateClass: (cls: ICreateClassData) => void
  handleUpdateClass: (id: number, updatedData: IUpdateClassData) => void
  handleDeleteClass: (id: number) => void
  handleFindClass: (id: number) => IClass | null
}

export const ClassesContext = React.createContext({} as ClassesContextProps)
