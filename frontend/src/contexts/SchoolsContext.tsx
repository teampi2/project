import * as React from 'react'

interface SchoolsContextProps {
  schools: ISchool[]
  currentSchool: ISchool | null
  setCurrentSchool: React.Dispatch<React.SetStateAction<ISchool | null>>
  openCreateDialog: boolean
  openUpdateDialog: boolean
  handleToggleCreateDialog: () => void
  handleToggleUpdateDialog: () => void
  handleCreateSchool: (school: ICreateSchoolData) => void
  handleUpdateSchool: (id: number, updatedData: IUpdateSchoolData) => void
  handleDeleteSchool: (id: number) => void
  handleFindSchool: (id: number) => ISchool
}

export const SchoolsContext = React.createContext({} as SchoolsContextProps)
